<?php

/**
 * HtmlNav
 * Generates a HTML <nav> element
 *
 * @author garethflowers
 */
class HtmlNav extends HtmlContainer
{

    /**
     * Constructs a new instance of the HtmlNav
     */
    public function __construct()
    {
        parent::__construct( 'nav' );
    }

    /**
     * Create a new instance of the HtmlNav
     * @param mixed $content Content
     * @return HtmlNav
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

        $result .= '<ul>';

        foreach ( $this->content as $content )
        {
            $result .= '<li>' . $content . '</li>';
        }

        $result .= '</ul>';

        $result .= $this->renderEndTag();

        return $result;
    }

}
