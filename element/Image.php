<?php

/**
 * Image
 * @author garethflowers
 */
class Image extends Element
{

    public function __construct( $id = NULL, $class = NULL, $src = NULL )
    {
        parent::__construct( 'img', $id, $class );
        $this->setSrc( $src );
    }

    public function setSrc( $value )
    {
        if ( !isset( $value ) )
        {
            $value = '';
        }

        $this->setAttribute( 'src', $value );
    }

}

?>
