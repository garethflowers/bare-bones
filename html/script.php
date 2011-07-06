<?php

/**
 * HtmlScript
 * Generates a HTML <script type="text/javascript"> element
 *
 * @author garethflowers
 */
class HtmlScript extends HtmlContainer
{

    private $domready;

    /**
     * Construct a new HtmlScript
     */
    public function __construct()
    {
        parent::__construct( 'script' );
    }

    /**
     * Create a new instance of the HtmlScript
     * @param bool $domready
     * @param mixed $content Content
     * @return HtmlScript
     */
    public static function create( $domready = TRUE, $content = NULL )
    {
        $class = parent::create( $content );

        $class->setAttribute( 'type', 'text/javascript' );
        $class->domready = (bool) $domready;

        return $class;
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
