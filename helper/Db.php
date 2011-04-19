<?php

/**
 * Db
 * @author Gareth Flowers <gareth@garethflowers.com>
 */
class Db
{

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

}

?>
