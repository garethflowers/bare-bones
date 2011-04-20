<?php

/**
 * Div
 * @author Gareth Flowers <gareth@garethflowers.com>
 */
class Div extends ContainerElement
{

    public function __construct( $id = NULL, $class=NULL, $content = NULL )
    {
        parent::__construct( 'div', $id, $class, $content );
    }

}

?>
