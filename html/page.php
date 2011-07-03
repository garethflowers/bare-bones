<?php

/**
 * HtmlPage
 * Generates a HTML <html> element, including <head> and <body>
 *
 * @author garethflowers
 */
class HtmlPage extends HtmlContainer
{

    public $header;
    public $footer;
    public $head;

    /**
     * Constructs a new instance of the HtmlPage
     */
    protected function __construct()
    {
        parent::__construct( 'div' );
    }

    /**
     * Create a new instance of the HtmlPage
     * @return HtmlPage
     */
    public static function create()
    {
        $class = __CLASS__;
        $class = new $class();

        $class->setId( 'content' );
        $class->head = new HtmlHead();
        $class->header = new HtmlHeader();
        $class->footer = new HtmlFooter();

        return $class;
    }

    /**
     * Set the page title
     * @param string $title
     */
    public function setTitle( $title )
    {
        $this->head->setTitle( trim( strval( $title ) ) );
    }

    /**
     * Set the document description
     * @param string $description
     */
    public function setDescription( $description )
    {
        $this->head->setDescription( $description );
    }

    /**
     * Add a keyword to the page header
     * @param string $word
     */
    public function addKeyword( $word )
    {
        $this->head->addKeyword( $word );
    }

    /**
     * Renders the page as HTML
     * @return string
     */
    public function render()
    {
        $html = '<!DOCTYPE html>';
        $html .= '<html lang="en">';
        $html .= $this->head->render();
        $html .= '<body>';
        $html .= '<div id="body">';
        $html .= $this->header->render();
        $html .= parent::render();
        $html .= $this->footer->render();
        $html .= '</div>';
        $html .= '</body>';
        $html .= '</html>';
        return $html;
    }

}
