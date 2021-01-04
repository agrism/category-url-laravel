<?php


namespace App\Services;


use App\Models\Category;
use stdClass;

class Value
{
	/*** @var stdClass */
	private $key;

	/*** @var stdClass */
	private $value;

	/*** @return static */
	public static function factory(): self
	{
		return new self;
	}

	/**
	 * @param Category $category
	 * @return $this
	 */
	public function setKey(Category $category): self
	{
		$this->key = $category;

		return $this;
	}

	/**
	 * @param  Category  $category
	 * @return $this
	 */
	public function setValue(Category $category): self
	{
		$this->value = $category;

		return $this;
	}

	/*** @return Category */
	public function getKey(): Category
	{
		return $this->key;
	}

	/*** @return Category */
	public function getValue(): Category
	{
		return $this->value;
	}

}