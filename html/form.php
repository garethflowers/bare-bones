<?php

/**
 * HTML Form
 * Generates a HTML <form> element
 *
 * @author garethflowers
 */
class HtmlForm extends HtmlContainer
{

    /**
     *
     * @param type $name
     * @param type $method
     * @param type $action
     */
    public function __construct( $name, $action, $method )
    {
        parent::__construct( 'form' );
        $this->setAttribute( 'name', $name );
        $this->setAttribute( 'action', $action );
        $this->setAttribute( 'method', $method );
    }

    public function setName( $value )
    {
        $this->setAttribute( 'name', $value );
    }

    public static function Label( $name, $for )
    {
        return '<label for="' . $for . '">' . $name . '</label>';
    }

    public static function TextArea( $name, $value, $rows )
    {
        if ( intval( $rows ) > 1 )
        {
            return '<textarea id="' . $name . '" name="' . $name . '" rows="' . intval( $name ) . '" cols="50">' . $value . '</textarea>';
        }
        else
        {
            return '<input type="text" id="' . $name . '" name="' . $name . '" value="' . $value . '" />';
        }
    }

    public static function Submit( $name, $value )
    {
        return '<input type="submit" id="' . $name . '" name="' . $name . '" value="' . $value . '" />';
    }

}
