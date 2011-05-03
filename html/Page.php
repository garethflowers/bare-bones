<?php

/**
 * Page
 * @author garethflowers
 */
class Page extends Html_Container
{

    /**
     *
     * @var Container
     */
    public $header;
    /**
     *
     * @var Container
     */
    public $footer;
    /**
     *
     * @var PageHead
     */
    public $head;

    /**
     * create new instance of the Page class
     * @param string $template
     */
    public function __construct( $template = NULL )
    {
        parent::__construct( 'div', 'content', NULL, NULL );
        $this->head = new PageHead();
        $this->header = new Header();
        $this->footer = new Footer();
    }

    /**
     * set the page title
     * @param string $title
     */
    public function setTitle( $title )
    {
        $this->head->setTitle( $title );
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

?>