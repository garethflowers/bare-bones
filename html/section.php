<?php

/**
 * HtmlSection
 * @author garethflowers
 */
class HtmlSection extends HtmlContainer
{

    /**
     * Constructs a new instance of the HtmlSection
     */
    public function __construct()
    {
        parent::__construct( 'div' );
    }

    /**
     * Create a new instance of the HtmlSection
     * @return HtmlSection
     */
    public static function create( $id = NULL, $content = NULL )
    {
        $class = __CLASS__;
        $class = new $class();

        $class->setId( $id );
        $class->setContent( $content );

        return $class;
    }

}
