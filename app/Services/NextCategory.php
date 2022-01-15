<?php


namespace App\Services;


class NextCategory
{
	/*** @var string[] */
	public $linkSegments = [];

	public $category;

	/*** @return static */
	public static function factory(): self
	{
		return new self;
	}

	/*** @return $this */
	public function clear(): self
	{
		$this->category = null;

		$this->linkSegments = [];

		return $this;
	}
}