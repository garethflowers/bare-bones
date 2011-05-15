<?php

/**
 * PostgreSQL Database Connection
 * @author garethflowers
 */
class PgSqlDb implements IDbConnection
{

    private static $connection;
    private $username;
    private $password;
    private $server;
    private $database;

    /**
     *
     * @return PgSqlDb
     */
    public static function connection( $server, $database, $username, $password )
    {
        if ( !isset( self::$connection ) )
        {
            $c = __CLASS__;
            self::$connection = new $c;
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
        $conn = 'host=' . $this->server . ' dbname=' . $this->database . ' user=' . $this->username . ' password=' . $this->password;
        return pg_connect( $conn );
    }

    /**
     * execute a database query and return the result
     * @param string $query
     * @param boolean $redirect redirect to error page on failure
     * @return boolean
     */
    public function execQuery( $query )
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
    public function getData( $query )
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