<?php

/**
 * Div
 * @author garethflowers
 */
class Div extends ContainerElement
{

    public function __construct( $id = NULL, $class=NULL, $content = NULL )
    {
        parent::__construct( 'div', $id, $class, $content );
    }

}

?>
