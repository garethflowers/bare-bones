<?php

/**
 * Validation
 */
class ValidationUtil {

    /**
     * Validates an email address
     * @param string $email
     * @return boolean
     */
    public static function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Validates an email address
     * @param string $email
     * @return boolean
     */
    public static function isUrl($email) {
        return filter_var($email, FILTER_VALIDATE_URL);
    }

    /**
     * Validates a date
     * @param string $date
     * @return boolean
     */
    public static function isDate($date) {
        if (!empty($date) && count(explode('-', (string) $date)) == 3) {
            $dd = null;
            $mm = null;
            $yyyy = null;
            list($dd, $mm, $yyyy) = explode('-', (string) $date);

            if (is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy) && intval($yyyy) > 1900 && intval($yyyy) < 2500) {
                return checkdate(intval($mm), intval($dd), intval($yyyy));
            }
        }

        return false;
    }

}
