<?php

/**
 * ContainerElement
 * @author Gareth Flowers <gareth@garethflowers.com>
 * @version 0.1
 */
class ContainerElement extends Element
{

    /**
     * @var array contents of the container
     */
    private $content;

    /**
     * initiate a new ContainerElement
     * @param string $tag
     */
    public function __construct( $tag, $id = NULL, $class = NULL, $content = NULL )
    {
        parent::__construct( $tag, $id, $class );
        $this->content = array( );
        $this->addContent( $content );
    }

    /**
     * 
     * @return mixed[]
     */
    public function getContent()
    {
        return $this->content;
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
        $result = '<' . $this->tag;

        foreach ( $this->attributes as $attribute => $value )
        {
            $result .= ' ' . $attribute . '="' . $value . '"';
        }

        if ( $this->hasContent() )
        {
            $result .= '>';

            foreach ( $this->content as $content )
            {
                $result .= $content;
            }

            $result .= '</' . $this->tag . '>';
        }
        else
        {
            $result .= ' />';
        }

        return $result;
    }

}

?>