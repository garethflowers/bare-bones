<?php

/**
 * HTML Header
 * Generates a HTML <header> element
 *
 * @author garethflowers
 */
class HtmlHeader extends HtmlContainer
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct( 'header' );
    }

    /**
     * Factory method
     * @param mixed $content
     * @return HtmlHeader
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

}

?>
