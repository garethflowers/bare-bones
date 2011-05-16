<?php

/**
 * IDbConnection
 * @author garethflowers
 */
interface IDbConnection
{

    public static function connection();

    public function execQuery( $query );

    public function getData( $query );

}

?>
