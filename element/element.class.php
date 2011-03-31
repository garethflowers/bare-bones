<?php

class Element
{

    private $content;
    private $tag;
    private $attributes;

    public function __construct( $tag )
    {
        $this->tag = $tag;
        $this->attributes = array( );
        $this->content = array( );
    }

    public function __toString()
    {
        return $this->render();
    }

    public function getClass()
    {
        return $this->attributes['class'];
    }

    public function setClass( $class )
    {
        $this->attributes['class'] = $class;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId( $id )
    {
        $this->attributes['id'] = $id;
    }

    public function addAttribute( $attribute, $value )
    {
        $this->attributes[strtolower( $attribute )] = $value;
    }

    public function removeAttibute( $attribute )
    {
        unset( $this->attributes[strtolower( $attribute )] );
    }

    public function getAttribute( $attribute )
    {
        return $this->attributes[strtolower( $attribute )];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent( $content )
    {
        if ( is_array( $content ) )
        {
            $this->content = $content;
        }
        else
        {
            $this->content = array( $content );
        }
    }

    public function addContent( $content )
    {
        if ( is_array( $content ) )
        {
            $this->content = array_merge( $this->content, $content );
        }
        else
        {
            $this->content[] = $content;
        }
    }

    public function hasContent()
    {
        if ( count( $this->content ) > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function render()
    {
        $result = '<' . $this->tag;

        if ( !empty( $this->id ) )
        {
            $result .= ' id="' . $this->id . '"';
        }

        if ( !empty( $this->class ) )
        {
            $result .= ' class="' . $this->class . '"';
        }

        $result .= '>';

        foreach ( $this->content as $content )
        {
            $result .= $content;
        }

        $result .= '<' . $this->tag . '>';

        return $result;
    }

}

?>