<?php

/**
 * Grayscale Image Generator
 *
 * @author garethflowers
 */
class ImagingGrayscale implements IRenderable
{

    /**
     * @var string File Path
     */
    private $path;

    /**
     * Contruct new ImagingGrayscale
     * @param string $path
     */
    public function __construct( $path )
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . strval( $path );
    }

    /**
     * render class as a PNG image
     */
    public function render()
    {
        header( 'content-type: image/png' );

        $image = null;

        if ( file_exists( $this->path ) )
        {
            $image = imagecreatefrompng( $this->path );
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
