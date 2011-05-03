<?php

/**
 * Div
 * @author garethflowers
 */
class Header extends Html_Container
{

    public function __construct( $id = NULL, $class=NULL, $content = NULL )
    {
        parent::__construct( 'header', $id, $class, $content );
    }

}

?>
