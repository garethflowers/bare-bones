<?php

/**
 * HtmlImage
 * Generates a HTML <img> element
 * @author garethflowers
 */
class HtmlImage extends Html
{

    /**
     * Constructs a new instance of the HtmlImage
     */
    public function __construct()
    {
        parent::__construct( 'img' );
    }

    /**
     * Create a new instance of the HtmlImage
     * @param string $link
     * @param string $alttext
     * @return HtmlImage
     */
    public static function create( $source = NULL, $alttext = NULL )
    {
        $class = parent::create();

        $class->setSource( $source );
        $class->setAlt( $alttext );

        return $class;
    }

    /**
     * Set the source of the image
     * @param string $value
     */
    public function setSource( $value )
    {
        $this->setAttribute( 'src', $value );
    }

    /**
     * Set the Alt text for the image
     * @param string $text
     */
    public function setAlt( $text )
    {
        $this->setAttribute( 'alt', $text );
    }

}
