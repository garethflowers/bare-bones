<?php

/**
 * Link
 * @author Gareth Flowers <gareth@garethflowers.com>
 * @version 0.1
 */
class Link extends ContainerElement
{

    public function __construct( $id = NULL, $class = NULL, $href = NULL, $content = NULL )
    {
        parent::__construct( 'a' );
        $this->setHref( $href );
        $this->setContent( $content );
    }

    public function setHref( $value )
    {
        if ( !isset( $value ) )
        {
            $value = '';
        }

        $this->setAttribute( 'href', $value );
    }

}

?>
