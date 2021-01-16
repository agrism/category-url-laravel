<?php


namespace App\Services;


class Helper
{
	public static function factory(): Helper
	{
		return new static;
	}


	public function getLink(string $name, $path = '/'): string
	{
		$return = [];
		$return[] = '<a href="/';
		$return[] = $path;
		$return[] = '">';
		$return[] = $name;
		$return[] = '</a>';

		return implode('', $return);
	}
}