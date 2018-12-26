<?php

/**
 * Formatter
 */
class FormatterUtil
{

	public static function combineNonEmpty($combiner, $details)
	{
		$nonemptys = array();

		foreach ($details as $value) {
			if (!empty($value) && $value != '&nbsp;') {
				$nonemptys[] = $value;
			}
		}

		return implode($combiner, $nonemptys);
	}

}
