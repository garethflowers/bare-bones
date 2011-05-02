<?php

/**
 * MySQL Database Connection
 * @author garethflowers
 */
class MySqlDb extends Db implements IDbConnection
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
        return mysql_connect( $this->server, $this->username, $this->password );
    }

    /**
     * execute a database query and return the result
     * @param string $query
     * @return boolean
     */
    public function ExecQuery( $query )
    {
        $conn = $this->Connect();

        if ( !$conn )
        {
            return NULL;
        }

        mysql_select_db( $this->database );

        $result = mysql_query( $query, $conn );

        if ( !$result )
        {
            return NULL;
        }

        mysql_close( $conn );

        return $result;
    }

    /**
     * execute a query and any rows
     * @param string $query
     * @return mixed[]
     */
    public function GetData( $query )
    {
        $conn = $this->Connect();

        if ( !$conn )
        {
            return NULL;
        }

        mysql_select_db( $this->database );

        $result = mysql_query( $query, $conn );

        if ( !$result )
        {
            return NULL;
        }

        $data = array( );

        while ( $row = mysql_fetch_assoc( $result ) )
        {
            $data[] = $row;
        }

        mysql_close( $conn );

        return $data;
    }

}

?>