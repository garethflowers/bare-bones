<?php

/*
 * Curl Class
 * @author garethflowers
 */

class Curl
{

    public static function curl_get( $url )
    {
        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 4
        );

        $ch = curl_init();

        curl_setopt_array( $ch, $defaults );

        if ( !$result = curl_exec( $ch ) )
        {
            $result = NULL;
        }

        curl_close( $ch );

        return $result;
    }

}

?>
