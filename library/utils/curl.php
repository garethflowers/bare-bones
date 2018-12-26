<?php

/**
 * Curl Class
 *
 * @author garethflowers
 */
class CurlUtil
{

	/**
	 * execute a get using CURL and return the result
	 * @param string $url
	 * @return string
	 */
	public static function get($url)
	{
		$defaults = array(
			CURLOPT_URL => $url,
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 4
		);

		$ch = curl_init();

		curl_setopt_array($ch, $defaults);

		if (!$result = curl_exec($ch)) {
			$result = null;
		}

		curl_close($ch);

		return $result;
	}

}
