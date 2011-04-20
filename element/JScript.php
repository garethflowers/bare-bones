<?php

/**
 * JScript
 * @author Gareth Flowers <gareth@garethflowers.com>
 */
class JScript extends ContainerElement
{

    public function __construct( $id = NULL, $class=NULL, $content = NULL )
    {
        parent::__construct( 'script', $id, $class, $content );
        $this->setAttribute( 'type', 'text/javascript' );
    }

}

?>
