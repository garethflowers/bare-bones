<?php

/**
 * Html Base Class
 *
 * @author garethflowers
 */
abstract class Html implements IRenderable
{

    protected $tag;
    protected $attributes;

    /**
     * Constructs a new instance of the element
     */
    protected function __construct( $tag )
    {
        $this->tag = $tag;
        $this->attributes = array( );
    }

    /**
     * Sames as $this->render()
     * @return string
     */
    private function __toString()
    {
        return $this->render();
    }

    /**
     * Gets the Class of the element
     * @return string
     */
    public function getClass()
    {
        return array_key_exists( 'class', $this->attributes ) ? $this->attributes['class'] : '';
    }

    /**
     * Sets the Class of the element
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
     * Gets the ID of the element
     * @return string
     */
    public function getId()
    {
        return array_key_exists( 'id', $this->attributes ) ? $this->attributes['id'] : '';
    }

    /**
     * Sets the ID of the Element
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
     * Gets an attribute of the element
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
     * Sets an attribute on the element
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
     * Gets all the attributes of the element
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Checks if the element has any attributes
     * @return bool
     */
    public function hasAttributes()
    {
        return count( $this->attributes ) > 0;
    }

    /**
     * Renders the element as HTML
     * @return string HTML version of the element and its contents
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