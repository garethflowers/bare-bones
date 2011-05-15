<?php

/**
 * ContainerElement
 * @author garethflowers
 */
abstract class HtmlContainer extends Html
{

    /**
     * @var array contents of the container
     */
    private $content;

    /**
     * initiate a new ContainerElement
     */
    protected function __construct( $tag )
    {
        parent::__construct( $tag );
        $this->content = array( );
    }

    /**
     * get Content
     * @return mixed[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * clears the content
     */
    public function clearContent()
    {
        $this->content = array( );
    }

    /**
     *
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
     *
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
     *
     * @return integer
     */
    public function hasContent()
    {
        return count( $this->content ) > 0;
    }

    /**
     * renders the element
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
