<?php

namespace App\Http\Controllers\Ad;

use Agrism\PhpHtml\Table\Table;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPropery;
use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
	private $categories;


	public function index(Request $request)
	{
		Log::debug('12333323232323');

		$this->categories = Category::all();

		$this->renderStyle();

		$table = Table::factory()->addAttribute('style', 'float:left;margin-right:10px');

		$catId = $request->get('catId', null);

		$categs = $this->categories;

		$links = [];

		$links = $this->getParentLink($catId, $links);
		$categs = $categs->where('parent_id', $catId);


		$links[] = Helper::factory()->getLink('Home', 'ad');

		$table->addRow([implode(' &raquo; ', array_reverse($links))], ['class' => 'parent-y']);

		foreach ($categs->all() as $index => $cat) {
			$table->addRow([Helper::factory()->getLink($cat->name, 'ad?catId='.$cat->id)]);
		}

		$table->render();

		if($current = $this->categories->where('id', $catId)->first()){
			/**
			 * @var $current Category
			 */
			$table = Table::factory()->addAttribute('style', 'float:left');
			foreach ($current->properties as $prop){
				$table->addRow([$prop->id,$prop->name]);
			}

			$table->render();

		}

	}

	private function getParentLink($categoryId, $link = []): array
	{
		if ($cat = $this->categories->where('id', $categoryId)->first()) {

			$link[] = Helper::factory()->getLink($cat->name, 'ad?catId='.$cat->id);

			if ($cat->parent_id) {
				$link = $this->getParentLink($cat->parent_id, $link);
			}
		}

		return $link;
	}


	private function renderCategoryProps($catId)
	{
		$prop = CategoryPropery::where('category_id', $catId)->get();
	}

	private function renderStyle()
	{
		echo '<style>
	tr.parent-y * {
		background-color: yellow;
	}
    table {
		border-width: 1px;
		border-spacing: 0px;
		border-style: solid;
		border-color: black;
		border-collapse: separate;
		background-color: white;
    }
    table th {
		border-width: 1px;
		padding: 3px;
		border-style: solid;
		border-color: black;
		background-color: white;
    }
    table td {
		border-width: 1px;
		padding: 3px;
		border-style: solid;
		border-color: black;
		background-color: white;
    }
</style>';
	}
}
