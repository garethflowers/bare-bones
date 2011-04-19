<?php

/**
 * IDbConnection
 * @author Gareth Flowers <gareth@garethflowers.com>
 */
interface IDbConnection
{

    public function ExecQuery( $query );

    public function GetData( $query );

}

?>
