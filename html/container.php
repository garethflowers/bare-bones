<?php

/**
 * HTML Base Container Class
 *
 * @author garethflowers
 */
abstract class HtmlContainer extends Html
{

    /**
     * @var array contents of the container
     */
    private $content;

    /**
     * Constructs a new instance of the container
     */
    protected function __construct( $tag )
    {
        parent::__construct( $tag );
        $this->content = array( );
    }

    /**
     * Gets the content of the element
     * @return mixed[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Clears the content of the element
     */
    public function clearContent()
    {
        $this->content = array( );
    }

    /**
     * Sets the content of the element
     * @param mixed $value
     */
    public function setContent( $value )
    {
        if ( is_array( $value ) )
        {
            $this->content = $value;
        }
        else
        {
            $this->content = array( $value );
        }
    }

    /**
     * Adds content to the element
     * @param mixed $value
     */
    public function addContent( $value )
    {
        if ( !isset( $value ) )
        {
            return;
        }

        if ( is_array( $value ) )
        {
            $this->content = array_merge( $this->content, $value );
        }
        else
        {
            $this->content[] = $value;
        }
    }

    /**
     * Checks if the element has any content
     * @return integer
     */
    public function hasContent()
    {
        return count( $this->content ) > 0;
    }

    /**
     * Renders the element as HTML
     * @return string
     */
    public function render()
    {
        if ( !$this->hasAttributes() && !$this->hasContent() )
        {
            return '';
        }

        $result = '<' . $this->tag;

        foreach ( $this->attributes as $attribute => $value )
        {
            $result .= ' ' . $attribute . '="' . $value . '"';
        }

        $result .= '>';

        foreach ( $this->content as $content )
        {
            $result .= $content;
        }

        $result .= '</' . $this->tag . '>';

        return $result;
    }

}
