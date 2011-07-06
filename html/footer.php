<?php

/**
 * HTML Footer
 * Generates a HTML <footer> element
 *
 * @author garethflowers
 */
class HtmlFooter extends HtmlContainer
{

    public function __construct()
    {
        parent::__construct( 'footer' );
    }

    /**
     * Factory method
     * @param mixed $content
     * @return HtmlFooter
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

}
