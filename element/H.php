<?php

/**
 * Div
 * @author garethflowers
 */
class H extends ContainerElement
{

    public function __construct( $level, $id = NULL, $class = NULL, $content = NULL )
    {
        $level = intval( $level );

        if ( $level < 1 || $level > 6 )
        {
            $level = 1;
        }

        parent::__construct( 'H' . strval( $level ), $id, $class, $content );
    }

}

?>
