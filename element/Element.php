<?php

/**
 * Element
 * @author Gareth Flowers <gareth@garethflowers.com>
 * @version 0.1
 */
class Element implements IRenderable
{

    protected $tag;
    protected $attributes;

    /**
     *
     * @param string $tag
     */
    public function __construct( $tag, $id, $class )
    {
        $this->tag = $tag;
        $this->attributes = array( );
        $this->setId( $id );
        $this->setClass( $class );
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     *
     * @return string
     */
    public function getClass()
    {
        return array_key_exists( 'class', $this->attributes ) ? $this->attributes['class'] : '';
    }

    /**
     *
     * @param string $value
     */
    public function setClass( $value )
    {
        if ( isset( $value ) )
        {
            $this->attributes['class'] = strtolower( strval( $value ) );
            return;
        }

        if ( array_key_exists( 'class', $this->attributes ) )
        {
            unset( $this->attributes['class'] );
            return;
        }
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return array_key_exists( 'id', $this->attributes ) ? $this->attributes['id'] : '';
    }

    /**
     *
     * @param string $value
     */
    public function setId( $value )
    {
        if ( isset( $value ) )
        {
            $this->attributes['id'] = strtolower( strval( $value ) );
            return;
        }

        if ( array_key_exists( 'id', $this->attributes ) )
        {
            unset( $this->attributes['id'] );
            return;
        }
    }

    /**
     *
     * @param string $attribute
     * @return string
     */
    public function getAttribute( $attribute )
    {
        if ( array_key_exists( $attribute, $this->attributes ) )
        {
            return $this->attributes[strtolower( $attribute )];
        }

        return '';
    }

    /**
     *
     * @param string $attribute
     * @param string $value
     */
    public function setAttribute( $attribute, $value )
    {
        $attribute = strtolower( strval( $attribute ) );

        if ( isset( $value ) )
        {
            $this->attributes[$attribute] = strval( $value );
            return;
        }

        if ( array_key_exists( $attribute, $this->attributes ) )
        {
            unset( $this->attributes[$attribute] );
            return;
        }
    }

    /**
     *
     * @return string[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     *
     * @return bool
     */
    public function hasAttributes()
    {
        return count( $this->attributes ) > 0;
    }

    /**
     *
     * @return string 
     */
    public function render()
    {
        if ( !$this->hasAttributes() )
        {
            return '';
        }

        $result = '<' . $this->tag;

        foreach ( $this->attributes as $attribute => $value )
        {
            $result .= ' ' . $attribute . '="' . $value . '"';
        }

        $result .= ' />';

        return $result;
    }

}

?>