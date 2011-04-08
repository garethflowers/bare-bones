<?php

/**
 * define types for use with Db class
 */
define( 'DB_TYPE_PGSQL', 'PGSQL' );
define( 'DB_TYPE_MYSQL', 'MYSQL' );

/**
 * Database Class
 * @author Gareth Flowers <gareth@garethflowers.com>
 * @version 0.3
 */
class Db
{

    private $type;
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;
    private $errorpage;

    /**
     * create a new instance of the Database class
     * @param constant $type one of: DB_TYPE_MYSQL, DB_TYPE_PGSQL
     * @param string $server
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $errorpage
     */
    public function __construct( $type, $server, $username, $password, $database, $errorpage )
    {
        $this->type = $type;
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->errorpage = $errorpage;

        switch ( $this->type )
        {
            case DB_TYPE_MYSQL:
                $this->connection = mysql_connect( $server, $username, $password );
                break;
            case DB_TYPE_PGSQL:
                $conn = 'host=' . $this->server . ' dbname=' . $this->database . ' user=' . $this->username . ' password=' . $this->password;
                $this->connection = pg_connect( $conn );
                break;
            default:
                return null;
        }

        if ( !$this->connection || ( $this->type == 'mysql' && !mysql_select_db( $database, $this->connection ) ) )
        {
            header( 'location: ' . $this->errorpage );
            exit;
        }
    }

    /**
     * execute a database query and return the result
     * @param string $query
     * @param boolean $redirect redirect to error page on failure
     * @return boolean
     */
    public function ExecuteQuery( $query, $redirect = true )
    {
        $result = false;

        switch ( $this->type )
        {
            case 'mysql':
                $result = mysql_query( $query, $this->connection );
                break;
            case 'pgsql':
                $result = pg_query( $query );
                break;
            default:
                return null;
        }

        if ( !$result )
        {
            if ( $redirect )
            {
                header( 'location: ' . $this->errorpage );
                exit;
            }
            else
            {
                return null;
            }
        }
        else
        {
            return $result;
        }
    }

    /**
     * execute a query and any rows
     * @param string $query
     * @param boolean $redirect
     * @return array
     */
    public function GetData( $query, $redirect = false )
    {
        $result = null;

        switch ( $this->type )
        {
            case 'mysql':
                $result = mysql_query( $query, $this->connection );
                break;
            case 'pgsql':
                $result = pg_query( $query );
                break;
            default:
                return $result;
        }

        if ( !$result )
        {
            if ( $redirect )
            {
                header( 'location: ' . $this->errorpage );
                exit;
            }
            else
            {
                return null;
            }
        }
        else
        {
            $data = array( );

            switch ( $this->type )
            {
                case 'mysql':
                    while ( ( $data[] = mysql_fetch_assoc( $result ) ) || array_pop( $data )

                        );
                    break;
                case 'pgsql':
                    $data = pg_fetch_all( $result );
                    break;
                default:
                    return null;
            }

            $value = null;
            $tempdata = null;

            if ( is_array( $data ) && count( $data ) > 0 )
            {
                foreach ( $data as &$tempdata )
                {
                    if ( is_array( $tempdata ) && count( $tempdata ) > 0 )
                    {
                        foreach ( $tempdata as &$value )
                        {
                            $value = htmlspecialchars( trim( $value ) );
                        }
                    }
                }
                return $data;
            }
            else
            {
                return null;
            }
        }
    }

    /**
     * formats a variable for use within a SQL query
     * @param mixed $value the variable to convert
     * @param string $type type to convert the $value to
     * @return string SQL version of $value
     */
    public function SqlFormat( $value, $type )
    {
        switch ( $type )
        {
            case 'string':
            case 'text':
                if ( !is_null( $value ) )
                {
                    switch ( $this->type )
                    {
                        case 'mysql':
                            return '\'' . mysql_escape_string( utf8_encode( trim( $value ) ) ) . '\'';
                            break;
                        case 'pgsql':
                            return '\'' . pg_escape_string( utf8_encode( trim( $value ) ) ) . '\'';
                            break;
                        default:
                            return '';
                    }
                }
                else
                {
                    return '';
                }
            case 'integer':
            case 'int':
                return is_numeric( $value ) ? (string) intval( $value ) : 'null';
                break;
            case 'decimal':
            case 'dec':
            case 'float':
            case 'double':
                return is_numeric( $value ) ? (string) floatval( $value ) : 'null';
                break;
            case 'date':
                if ( !empty( $value ) && count( explode( '-', $value ) ) == 3 )
                {
                    return vsprintf( '\'%04d-%02d-%02d\'', array_reverse( explode( '-', $value ) ) );
                }
                else
                {
                    return 'null';
                }
                break;
            case 'boolean':
            case 'bool':
                return!empty( $value ) && $value ? 'true' : 'false';
                break;
            case 'timestamp':
                return!empty( $value ) && $value != '--' ? '\'' . $value . '\'' : 'null';
                break;
            case 'image':
            case 'picture':
                return!empty( $value ) ? '\'' . chunk_split( base64_encode( $value ) ) . '\'' : 'null';
                break;
        }
    }

}

?>