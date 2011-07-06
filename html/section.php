<?php

/**
 * HtmlSection
 * Generates a HTML <div> element
 *
 * @author garethflowers
 */
class HtmlSection extends HtmlContainer
{

    /**
     * Constructs a new HtmlSection
     */
    public function __construct()
    {
        parent::__construct( 'div' );
    }

    /**
     * Create a new instance of the HtmlSection
     * @param mixed $content Content
     * @return HtmlSection
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

}
