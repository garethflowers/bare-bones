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
     * @param string $link Link
     * @param mixed $content Content
     * @return HtmlLink
     */
    public static function create( $link = NULL, $content = NULL )
    {
        $class = parent::create( $content );

        $class->setLink( $link );

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
