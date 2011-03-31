<?php

/**
 * Grayscale Image Generator
 * @author Gareth Flowers (gareth@garethflowers.com)
 * @version 0.1
 */
class Grayscale
{

    public function render()
    {
        header( 'content-type: image/png' );

        $image = null;

        if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) )
        {
            $filename = $_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['id'];
            $image = imagecreatefrompng( $filename );
            imagefilter( $image, IMG_FILTER_GRAYSCALE );
            imagefilter( $image, IMG_FILTER_BRIGHTNESS, 30 );
        }
        else
        {
            $image = imagecreatetruecolor( 1, 1 );
        }

        imagepng( $image );
    }

}

?>