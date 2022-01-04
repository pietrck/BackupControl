<?php

namespace App\View;

/**
 * 
 */
class View
{
	public static function render($file){
		$path = __DIR__."/../../Views/";
		$filename = $path.$file.".html";

		if (file_exists($filename)) {
			return file_get_contents($filename);
		}

		return View::render("404");
	}
}