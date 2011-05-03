<?php

/**
 * JScript
 * @author garethflowers
 */
class JScript extends Html_Container
{

    private $domready;

    public function __construct( $domready, $content = NULL )
    {
        parent::__construct( 'script', NULL, NULL, $content );
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

?>
