<?php

/**
 * MySQL Database Connection
 * @author garethflowers
 */
class MySqlDb implements IDbConnection
{

    private static $connection;
    private $username;
    private $password;
    private $server;
    private $database;

    /**
     *
     * @return MySqlDb
     */
    public static function connection( $server, $database, $username, $password )
    {
        if ( !isset( self::$connection ) )
        {
            $c = __CLASS__;
            self::$connection = new $c( $server, $database, $username, $password );
        }

        return self::$connection;
    }

    private function __construct( $server, $database, $username, $password )
    {
        $this->server = $server;
        $this->database = $database;
        $htis->username = $username;
        $this->password = $password;
    }

    public static function FormatStr( $value )
    {
        if ( empty( $value ) )
        {
            return '';
        }

        return '\'' . mysql_escape_string( utf8_encode( trim( $value ) ) ) . '\'';
    }

    public static function FormatInt( $value )
    {
        if ( !is_numeric( $value ) )
        {
            return 'NULL';
        }

        return strval( intval( $value ) );
    }

    public static function FormatFloat( $value )
    {
        if ( !is_numeric( $value ) )
        {
            return 'NULL';
        }

        return strval( floatval( $value ) );
    }

    public static function FormatDate( $value )
    {
        if ( !empty( $value ) && count( explode( '-', $value ) ) == 3 )
        {
            return vsprintf( '\'%04d-%02d-%02d\'', array_reverse( explode( '-', $value ) ) );
        }
        else
        {
            return 'NULL';
        }
    }

    public static function FormatTimestamp( $value )
    {
        return!empty( $value ) && $value != '--' ? '\'' . $value . '\'' : 'null';
    }

    public static function FormatBool( $value )
    {
        if ( !is_bool( $value ) )
        {
            return 'NULL';
        }

        if ( (bool) $value )
        {
            return 'TRUE';
        }
        else
        {
            return 'FALSE';
        }
    }

    public static function FormatPicture( $value )
    {
        return!empty( $value ) ? '\'' . chunk_split( base64_encode( $value ) ) . '\'' : 'null';
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
    public function execQuery( $query )
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
    public function getData( $query )
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