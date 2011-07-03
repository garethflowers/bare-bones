<?php

/**
 * Thumbnail Image Generator
 *
 * @author garethflowers
 */
class ImagingThumbNail implements IRenderable
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
     * render class as a thumbnail PNG image
     */
    public function render()
    {
        header( 'content-type: image/png' );

        $image = null;

        if ( file_exists( $this->path ) )
        {
            $image = imagecreatefrompng( $this->path );
            $width = 180;
            $height = 180;
            $width_orig = 0;
            $height_orig = 0;

            list( $width_orig, $height_orig ) = getimagesize( $this->path );

            if ( $width && ( $width_orig < $height_orig ) )
            {
                $width = $height_orig / $height_orig * $width_orig;
            }
            else
            {
                $height = $width / $width_orig * $height_orig;
            }

            $image_p = imagecreatetruecolor( $width, $height );
            imagecopyresampled( $image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig );
            $image = $image_p;
        }
        else
        {
            $image = imagecreatetruecolor( 1, 1 );
        }

        imagepng( $image );
    }

}

?>