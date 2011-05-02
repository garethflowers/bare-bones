<?php

/**
 * Link
 * @author garethflowers
 */
class Link extends ContainerElement
{

    public function __construct( $id, $class, $href, $content )
    {
        parent::__construct( 'a', $id, $class, $content );
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
