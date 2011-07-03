<?php

/**
 * HtmlTitle
 * Generates a HTML <h1>, <h2>, <h3>, <h4>, <h5> or <h6> element
 * 
 * @author garethflowers
 */
class HtmlTitle extends HtmlContainer
{

    /**
     *
     * @param integer $level
     */
    public function __construct( $level )
    {
        $level = intval( $level );

        if ( $level < 1 || $level > 6 )
        {
            $level = 1;
        }

        parent::__construct( 'H' . strval( $level ) );
    }

    /**
     * Create a new instance of the HtmlTitle
     * @param int $level
     * @param string $id
     * @param mixed $content
     * @return HtmlTitle
     */
    public static function create( $level, $id = NULL, $content = NULL )
    {
        $class = __CLASS__;
        $class = new $class( $level );

        $class->setId( $id );
        $class->setContent( $content );

        return $class;
    }

}
