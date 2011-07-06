<?php

/**
 * HtmlSpan
 * Generates a HTML <span> element
 *
 * @author garethflowers
 */
class HtmlSpan extends HtmlContainer
{

    /**
     * Construct a new HtmlSpan
     */
    public function __construct()
    {
        parent::__construct( 'span' );
    }

    /**
     * Create a new instance of the HtmlSpan
     * @param mixed $content Content
     * @return HtmlSpan
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

}
