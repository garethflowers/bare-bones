<?php

/**
 * Div
 * @author garethflowers
 */
class HtmlTitle extends HtmlContainer
{

    /**
     *
     * @param integer $level
     */
    public function __construct( $level = 1 )
    {
        $level = intval( $level );

        if ( $level < 1 || $level > 6 )
        {
            $level = 1;
        }

        parent::__construct( 'H' . strval( $level ) );
    }

}
