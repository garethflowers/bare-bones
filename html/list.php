<?php

/**
 * HtmlList
 * Generates a HTML <ul> or <ol> element
 *
 * @author garethflowers
 */
class HtmlList extends HtmlContainer
{

    /**
     * Constructs a new HtmlList
     */
    public function __construct()
    {
        parent::__construct( 'ul' );
    }

    /**
     * Create a new instance of the HtmlList
     * @param mixed $content Content
     * @return HtmlList
     */
    public static function create( $content = NULL )
    {
        $class = parent::create( $content );

        return $class;
    }

    /**
     *
     * @return string
     */
    public function render()
    {
        $result = $this->renderStartTag( FALSE );

        foreach ( $this->content as $content )
        {
            $result .= '<li>' . $content . '</li>';
        }

        $result .= $this->renderEndTag();

        return $result;
    }

}
