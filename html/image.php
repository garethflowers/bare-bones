<?php

/**
 * HtmlImage
 * @author garethflowers
 */
class HtmlImage extends Html
{

    /**
     * Constructs a new instance of the HtmlImage
     * @param string $source
     */
    public function __construct()
    {
        parent::__construct( 'img' );
    }

    /**
     * Create a new instance of the HtmlImage
     * @param string $link
     * @return HtmlImage
     */
    public static function create( $source = NULL, $text = NULL, $id = NULL )
    {
        $class = __CLASS__;
        $class = new $class();

        $class->setSource( $source );
        $class->setAlt( $text );
        $class->setId( $id );

        return $class;
    }

    /**
     * Set the source of the image
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

    /**
     * Set the Alt text for the image
     * @param string $text
     */
    public function setAlt( $text )
    {
        if ( !isset( $text ) )
        {
            $text = '';
        }

        $this->setAttribute( 'alt', $text );
    }

}
