<?php

/**
 * IDbConnection
 * @author garethflowers
 */
interface IDbConnection
{

    public function ExecQuery( $query );

    public function GetData( $query );

}

?>
