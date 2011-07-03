<?php

/**
 * HtmlLink
 * Generates a HTML <a> element
 *
 * @author garethflowers
 */
class HtmlLink extends HtmlContainer
{

    /**
     * Constructs a new instance of the HtmlLink
     */
    public function __construct()
    {
        parent::__construct( 'a' );
    }

    /**
     * Create a new instance of the HtmlLink
     * @param string $link
     * @return HtmlLink
     */
    public static function create( $link = NULL, $id = NULL, $content = NULL )
    {
        $class = __CLASS__;
        $class = new $class();

        $class->setLink( $link );
        $class->setId( $id );
        $class->setContent( $content );

        return $class;
    }

    /**
     *
     * @param string $link
     */
    public function setLink( $link )
    {
        if ( isset( $link ) )
        {
            $link = trim( strval( $link ) );
        }
        else
        {
            $link = '#';
        }

        $this->setAttribute( 'href', $link );
    }

}
