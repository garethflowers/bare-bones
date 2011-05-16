<?php

/**
 * HtmlLink
 * @author garethflowers
 */
class HtmlLink extends HtmlContainer
{

    /**
     *
     * @param type $link
     */
    public function __construct( $link = NULL )
    {
        parent::__construct( 'a' );
        $this->setLink( $link );
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
