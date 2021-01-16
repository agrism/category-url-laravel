<?php

namespace App\Http\Controllers;

use Agrism\PhpHtml\Builder\Element;
use Agrism\PhpHtml\Table\Table;
use App\Models\Category;
use App\Models\Path;
use App\Services\Helper;
use App\Services\NextCategory;
use App\Services\Value;
use Illuminate\Support\Facades\Cache;
use stdClass;

class MainController extends Controller
{
	private $routeSegmentString;

	private $catLinks = [];

	public function index($route = null)
	{
		$this->routeSegmentString = $route;

		$this->renderPath();

		echo '<style>body {background-color: #b1d4b1}</style>';

		Element::factory('hr')->setEchoValue()->render();

		$this->doo();

//		dump($this->getValues());
	}

	private function getSegments(): array
	{
		return array_filter(explode('/', $this->routeSegmentString));
	}


	public function hasSegments(): bool
	{
		return boolval($this->getSegments());
	}

	/*** @return $this */
	public function renderPath(): self
	{
		$pathCategories = [];

		foreach ($this->getSegments() as $segment) {
			$foundCategory = Category::getCategoryByName($segment);
			if (!$foundCategory->name) {
				break;
			}
			$pathCategories[] = Category::getCategoryByName($segment);
		}

		$preparedLinks = $this->prepareLink($pathCategories);

		echo implode(' &rsaquo; ', $preparedLinks);

		return $this;
	}

	public function prepareLink(array $categories): array
	{
		$result = [];

		$path = [];

		$result[] = Helper::factory()->getLink('Home', '');

		foreach ($categories as $category) {

			$path[] = $category->name;

			$result[] = Helper::factory()->getLink($category->name, implode('/', $path));
		}

		return $result;
	}

	/*** @return $this */
	public function doo(): self
	{
		if (!$this->hasSegments()) {
			$this->renderCategoryLinks(Category::where('name', 'root')->first(), '');
			return $this;
		}

		$paths = Cache::remember('cat_path', 60, function () {
			return Path::with('pathElements.shouldBeSelected.category')
				->with('pathElements.category')
				->get();

		});

		$isAllPathsCompleted = false;

		foreach ($paths as $pathId => $path) {

			if ($isAllPathsCompleted) {
				break;
			}

			$pathCompleted = false;

			$pathSegments = $this->getSegments();

			if (empty($next)) {
				$next = new NextCategory;
			}

			$next->clear();

			foreach ($path->pathElements as $pathElement) {

				if (!$pathSegment = array_shift($pathSegments)) {
					$next->category = $pathElement->category;
					break;
				}

				$children = Category::getChildrenCategories($pathElement['category']->id);

				$isChildrenFound = false;

				foreach ($children as $child) {
					if (strtolower($child->name) === strtolower($pathSegment)) {

						foreach ($pathElement->shouldBeSelected as $shouldBeSelectedCategory) {

							if (strtolower($pathSegment) === strtolower($shouldBeSelectedCategory->category->name)) {

								$this->addValue(
									Value::factory()
										->setKey($pathElement->category)
										->setValue($shouldBeSelectedCategory->category)
								);

								$isChildrenFound = true;
								$next->linkSegments[] = $child->name;

								if (count($pathSegments) === 0) {
									$isAllPathsCompleted = true;
								}
								break;
							}
						}

						if (!$isChildrenFound) {
							foreach (Category::getChildrenCategories($pathElement->category) as $c) {
								if (strtolower($c->name) === strtolower($pathSegment)) {

									$this->addValue(
										Value::factory()
											->setKey($pathElement->category)
											->setValue($c)
									);
								}
							}
						}
					}
				}

				if (!$isChildrenFound) {
					$pathCompleted = true;
					break;
				}
			}

			if ($pathCompleted) {
				continue;
			}

			if ($next->category) {
				$this->renderCategoryLinks($next->category, implode('/', $next->linkSegments));
			}
		}

		return $this;
	}


	private function renderCategoryLinks(Category $category, $baseLink = ''): self
	{
		$table = Table::factory();

		$categoryLinks = Category::getChildrenCategories($category->id);

		usort($categoryLinks, function ($a, $b) {
			if ($a->priority !== $b->priority) {
				return $a->priority < $b->priority;
			}
			return $a->name > $b->name;
		});

		/*** @var stdClass */
		$prevCategory = null;

		$data = [];

		$x = 0;
		$y = 0;

		$count = count($categoryLinks);

		if ($count > 10) {
			$countPerRow = intval($count / 4);
			$countPerRow = !$countPerRow ? 1 : $countPerRow;
		} elseif ($count > 5) {
			$countPerRow = intval($count / 2);
			$countPerRow = !$countPerRow ? 1 : $countPerRow;
		} else {
			$countPerRow = $count;
		}


		foreach ($categoryLinks as $index => $childCategory) {

			$pathLink = [];
			$pathLink[] = $baseLink;
			$pathLink[] = $childCategory->name;
			$pathLink = array_filter($pathLink);
			$pathLink = implode('/', $pathLink);

			if ($index % $countPerRow == 0) {
				$y++;
				$x = 0;
			}

			$pre = '';

			$data[$x++][$y] = $pre.Helper::factory()->getLink($childCategory->name, $pathLink);

//			$table->addRow([$this->getLink($childCategory->name, $pathLink)]);
//			$prevCategory = $childCategory;
		}


		foreach ($data as $datum) {
			$table->addRow($datum);
		}

		echo '<style>
	.xxx > tbody >tr >td {
		width: 200px;
	}
</style>';

		$table->addAttribute('class', 'xxx')->render();


		return $this;
	}

	private $values = [];

	private function addValue(Value $value): self
	{
		if (!empty($this->values[$value->getKey()->name])) {
			return $this;
		}

		$this->values[$value->getKey()->name] = $value;

		return $this;
	}

	/*** @return Value[] */
	public function getValues(): array
	{
		return $this->values;
	}

}
