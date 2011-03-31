<?php

class TextBox extends Element
{

    private $columnCount;
    private $lineCount;

    public function __toString()
    {
        return $this->Render();
    }

    public function Render()
    {
        $result = '';

        if ( $this->lineCount <= 1 )
        {
            $result = '<input type="text"';
            $result .= $this->RenderDetails();
            $result .= ' />';
        }
        else
        {
            $result = '<textarea';
            $result .= $this->RenderDetails();

            if ( $this->columnCount > 0 )
            {
                $result .= ' cols="' . $this->columnCount . '"';
            }

            $result .= '><textarea/>';
        }

        return $result;
    }

    public function setColumnCount( $columnCount )
    {
        $this->columnCount = intval( $columnCount );
    }

    public function getColumnCount()
    {
        return $this->columnCount;
    }

    public function setLineCount( $lineCount )
    {
        $this->lineCount = intval( $lineCount );
    }

    public function getLineCount()
    {
        return $this->lineCount;
    }

}

?>