<?php

/**
 * Thumbnail Image Generator
 * @author gareth flowers
 */
class ThumbNail
{

	public function render()
	{
		header( 'content-type: image/png' );

		$image = null;

		if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) )
		{
			$filename = $_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['id'];
			$image = imagecreatefrompng( $filename );
			$width = 180;
			$height = 180;
			$width_orig = 0;
			$height_orig = 0;

			list( $width_orig, $height_orig ) = getimagesize( $filename );

			if ( $width && ( $width_orig < $height_orig ) )
			{
				$width = $height_origight / $height_orig * $width_orig;
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