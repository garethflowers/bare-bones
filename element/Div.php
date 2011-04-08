<?php

/**
 * Div
 * @author Gareth Flowers <gareth@garethflowers.com>
 * @version 0.1
 */
class Div extends ContainerElement
{

    public function __construct( $id = NULL, $class=NULL, $content = NULL )
    {
        parent::__construct( 'div', $id, $class, $content );
    }

}

?>
