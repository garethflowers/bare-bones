<?php

/**
 * JavaScript Class
 * @author Gareth Flowers <gareth@garethflowers.com>
 * @version 0.1
 */
class JavaScript
{

    /**
     *
     * @var javascript
     */
    private $content = '';

    /**
     *
     * @param javascript $content
     */
    public function __construct( $content = null )
    {
        $this->Add( $content );
    }

    /**
     *
     * @param javascript $content
     */
    public function Add( $content )
    {
        if ( !empty( $content ) )
        {
            $this->content .= $content;
        }
    }

    /**
     *
     * @return html
     */
    public function Render()
    {
        $html = '<script type="text/javascript">';
        $html .= "\n" . $this->content;
        $html .= "\n" . '</script>';

        return $html;
    }

}

?>