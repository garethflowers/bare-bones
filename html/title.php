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
     * Construct a new HtmlTitle
     */
    public function __construct()
    {
        parent::__construct( 'H1' );
    }

    /**
     * Create a new instance of the HtmlTitle
     * @param int $level
     * @param mixed $content
     * @return HtmlTitle
     */
    public static function create( $level, $content = NULL )
    {
        $class = parent::create( $content );

        $level = intval( $level );

        if ( $level < 1 || $level > 6 )
        {
            $level = 1;
        }

        $class->setTag( 'H' . $level );

        return $class;
    }

}
