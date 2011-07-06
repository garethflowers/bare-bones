<?php

if ( !function_exists( 'get_called_class' ) )
{

    function get_called_class( $bt = false, $l = 1 )
    {
        if ( !$bt )
        {
            $bt = debug_backtrace();
        }

        if ( !isset( $bt[$l] ) )
        {
            throw new Exception( "Cannot find called class -> stack level too deep." );
        }

        if ( !isset( $bt[$l]['type'] ) )
        {
            throw new Exception( 'type not set' );
        }


        switch ( $bt[$l]['type'] )
        {
            case '::':
                $lines = file( $bt[$l]['file'] );
                $i = 0;
                $callerLine = '';

                do
                {
                    $i++;
                    $callerLine = $lines[$bt[$l]['line'] - $i] . $callerLine;
                }
                while ( stripos( $callerLine, $bt[$l]['function'] ) === false );

                $matches = array( );
                preg_match( '/([a-zA-Z0-9\_]+)::' . $bt[$l]['function'] . '/', $callerLine, $matches );

                if ( !isset( $matches[1] ) )
                {
                    throw new Exception( "Could not find caller class: originating method call is obscured." );
                }

                switch ( $matches[1] )
                {
                    case 'self':
                        break;
                    case 'parent':
                        return get_called_class( $bt, $l + 1 );
                        break;
                    default:
                        return $matches[1];
                        break;
                }
                break;
            case '->':
                switch ( $bt[$l]['function'] )
                {
                    case '__get':
                        if ( !is_object( $bt[$l]['object'] ) )
                        {
                            throw new Exception( "Edge case fail. __get called on non object." );
                        }
                        return get_class( $bt[$l]['object'] );
                        break;
                    default:
                        return $bt[$l]['class'];
                        break;
                }
                break;
            default:
                throw new Exception( "Unknown backtrace method type" );
                break;
        }
    }

}
