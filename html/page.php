<?php

/**
 * Page
 * @author garethflowers
 */
class HtmlPage extends HtmlContainer
{

    public $header;
    public $footer;
    public $head;

    public function __construct()
    {
        parent::__construct( 'div' );
        $this->setId( 'content' );
        $this->head = new HtmlHead();
        $this->header = new HtmlHeader();
        $this->footer = new HtmlFooter();
    }

    /**
     * set the page title
     * @param string $title
     */
    public function setTitle( $title )
    {
        $this->head->setTitle( trim( strval( $title ) ) );
    }

    /**
     * set the document description
     * @param string $description
     */
    public function setDescription( $description )
    {
        $this->head->setDescription( $description );
    }

    /**
     * add a keyword to the page header
     * @param string $word
     */
    public function addKeyword( $word )
    {
        $this->head->addKeyword( $word );
    }

    /**
     * render the page a a complete html document
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
