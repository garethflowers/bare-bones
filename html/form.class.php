<?php

/**
 * Form Class
 * @author Gareth Flowers (gareth@garethflowers.com)
 * @version 0.1
 */
class Form
{

    private $method;
    private $action;
    private $name;
    private $content;

    public function __construct( $name, $method, $action, $content = '' )
    {
        $this->method = $method;
        $this->action = $action;
        $this->name = $name;
        $this->content = $content;
    }

    public function Render()
    {
        $html = '<form name="' . $this->name . '" action="' . $this->action . '" method="' . $this->method . '">';
        $html .= $this->content;
        $html .= '</form>';

        return $html;
    }

    public function AddContent( $content )
    {
        $this->content .= $content;
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

?>