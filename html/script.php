<?php

/**
 * JScript
 * @author garethflowers
 */
class HtmlScript extends HtmlContainer
{

    private $domready;

    /**
     *
     * @param boolean $domready
     */
    public function __construct( $domready = TRUE )
    {
        parent::__construct( 'script' );
        $this->setAttribute( 'type', 'text/javascript' );
        $this->domready = (bool) $domready;
    }

    public function render()
    {
        if ( $this->domready )
        {
            $content = array_merge( array( 'window.addEvent(\'domready\',function(){' ), $this->getContent() );
            $content[] = '});';
            $this->setContent( $content );
        }

        return parent::render();
    }

}
