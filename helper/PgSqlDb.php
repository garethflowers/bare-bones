<?php

/**
 * PostgreSQL Database Connection
 * @author Gareth Flowers <gareth@garethflowers.com>
 */
class PgSqlDb Extends Db implements IDbConnection
{

    private $server;
    private $username;
    private $password;
    private $database;

    /**
     * create a new instance of the Database class
     * @param string $server
     * @param string $username
     * @param string $password
     * @param string $database
     */
    public function __construct( $server, $username, $password, $database )
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    private function Connect()
    {
        $conn = 'host=' . $this->server . ' dbname=' . $this->database . ' user=' . $this->username . ' password=' . $this->password;
        return pg_connect( $conn );
    }

    /**
     * execute a database query and return the result
     * @param string $query
     * @param boolean $redirect redirect to error page on failure
     * @return boolean
     */
    public function ExecQuery( $query )
    {
        $conn = $this->Connect();

        if ( !$conn )
        {
            return NULL;
        }

        $result = pg_query( $conn, $query );

        if ( !$result )
        {
            return NULL;
        }

        pg_close( $conn );

        return $result;
    }

    /**
     * execute a query and any rows
     * @param string $query
     * @param boolean $redirect
     * @return array
     */
    public function GetData( $query )
    {
        $conn = $this->Connect();

        if ( !$conn )
        {
            return NULL;
        }

        $result = pg_query( $conn, $query );

        if ( !$result )
        {
            return NULL;
        }

        $data = pg_fetch_all( $result );

        pg_close( $conn );

        return $data;
    }

}

?>