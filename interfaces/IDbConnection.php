<?php

/**
 * IDbConnection
 * @author garethflowers
 */
interface IDbConnection
{

    public static function connection( $server, $database, $username, $password );

    public function execQuery( $query );

    public function getData( $query );

}

?>
