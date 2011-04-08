<?php

/**
 * Grayscale Image Generator
 * @author gareth flowers
 */
class Grayscale implements IRenderable
{

	private $path;

	/**
	 *
	 * @param string $path
	 */
	public function __construct( $path )
	{
		$this->path = strval( $path );
	}

	/**
	 *
	 */
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