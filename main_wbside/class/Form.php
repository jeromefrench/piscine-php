<?php

class Form {

	public static $name_class = "le-nom-de-ma-classe";

	public static function checkbox(string $name, string $value = null, array $data = []):string
	{
		$attributes = '';
		if (isset($date[$name]) && in_array($value, $data[$name]))
		{
			$attributes .= 'checked';
		}
		$class = self::$name_class;
		return <<<HTML
<input type="checkbox" name="{$name}[]" value="$value" $attributes class="{$class}">
HTML;
	}


}


?>
