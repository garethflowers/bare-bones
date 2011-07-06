<?php

/**
 * HTML Base Container Class
 *
 * @author garethflowers
 */
abstract class HtmlContainer extends Html
{

    /**
     * @var array Contents of the Container
     */
    protected $content = array( );

    /**
     * Constructs a new instance of the container
     */
    protected function __construct( $tag )
    {
        parent::__construct( $tag );
    }

    /**
     * Create a new instance of the HtmlSection
     * @return HtmlContainer
     */
    public static function create( $content = NULL )
    {
        $class = parent::create();

        $class->setContent( $content );

        return $class;
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
     * Gets the count of the content of the element
     * @return int
     */
    public function getContentCount()
    {
        return count( $this->content );
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
        $result = $this->renderStartTag( FALSE );

        foreach ( $this->content as $content )
        {
            $result .= $content;
        }

        $result .= $this->renderEndTag();

        return $result;
    }

}
