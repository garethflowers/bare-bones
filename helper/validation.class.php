<?php

/**
 * Validation
 * @author Gareth Flowers (gareth@garethflowers.com)
 * @version 0.1
 */
class Validation {

	/**
	 * validates an email address
	 * @param mixed $email
	 * @return boolean
	 */
	public static function IsEmail($email) {
		$pattern = '^([A-Za-z0-9\.|-|_]{1,60})([@])([A-Za-z0-9\.|-|_]{1,60})(\.)([A-Za-z]{2,3})$';
		return ereg($pattern, $email);
	}

	/**
	 * validates a date
	 * @param mixed $date
	 * @return boolean
	 */
	public static function IsDate($date) {
		if (!empty($date) && count(explode('-', (string) $date)) == 3) {
			$dd = null;
			$mm = null;
			$yyyy = null;
			list( $dd, $mm, $yyyy ) = explode('-', (string) $date);

			if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy) &&
			intval($yyyy) > 1900 && intval($yyyy) < 2500) {
				return checkdate(intval($mm), intval($dd), intval($yyyy));
			}
		}

		return false;
	}

}

?>