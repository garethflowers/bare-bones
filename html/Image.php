<?php

/**
 * HtmlImage
 * @author garethflowers
 */
class HtmlImage extends Html
{

    /**
     *
     * @param string $source
     */
    public function __construct( $source = NULL )
    {
        parent::__construct( 'img' );
        $this->setSource( $source );
    }

    /**
     *
     * @param string $value
     */
    public function setSource( $value )
    {
        if ( !isset( $value ) )
        {
            $value = '';
        }

        $this->setAttribute( 'src', $value );
    }

}
