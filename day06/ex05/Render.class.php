<?php

class Render
{
	private $_width;
	private $_height;
	private $_filename;
	const VERTEX = "vertex";
	const EDGE = "edge";
	const RASTERIZE = "rasterize";

	private $_image;

	public static $verbose = false;

	public function __construct($width, $height, $filename)
	{
		$this->_width = $width;
		$this->_height = $height;
		$this->_image = imagecreatetruecolor($this->_width, $this->_height);  //creer une image noire
		if (1)
		{
			/* echo "On construit un triangle"PHP_EOL; */
		}

	$this->_filename = $filename;

		if ($verbose)
			echo "je construc";
	}
	public function __destruc()
	{
		if ($verbose)
			echo "je deconstruc";
	}
	public function __toString()
	{
		return "je suis to string\n";
	}
	public static function doc()
	{
		echo "je suis la doc";
	}

	//Affiche un vertex (point) en coordonne ecran dans l'image generer (bref un piel)
	public function renderVertex(Vertex $screenVertex)
	{
	$color     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
		echo $r = $color->red;
		echo $g = $color->green;
		echo $b = $color->blue;
		$red = imagecolorallocate($this->_image, $r, $g, $b);
		imagesetpixel($this->_image, $screenVertex->getX(), $screenVertex->getY(), $red);
	}



	//Affiche un triangle dans le mode voulu
	public function renderTriangle(Triangle $triangle, $mode)
	{
		if ($mode == Render::VERTEX)
		{
			$this->renderVertex($triangle->_A);
			$this->renderVertex($triangle->_B);
			$this->renderVertex($triangle->_C);
		}
		if ($mode == Render::EDGE)
		{
			imageline ( $this->_image , $triangle->_A->getX() + $this->_width / 2 , $triangle->_A->getY() + $this->_height / 2, $triangle->_B->getX() + $this->_width / 2, $triangle->_B->getY() + $this->_height / 2, 0xFF0000 );
			imageline ( $this->_image , $triangle->_B->getX() + $this->_width / 2 , $triangle->_B->getY() + $this->_height / 2, $triangle->_C->getX() + $this->_width / 2, $triangle->_C->getY() + $this->_height / 2, 0xFF0000 );
			imageline ( $this->_image , $triangle->_C->getX() + $this->_width / 2 , $triangle->_C->getY() + $this->_height / 2, $triangle->_A->getX() + $this->_width / 2, $triangle->_A->getY() + $this->_height / 2, 0xFF0000 );
			if ($mode == Render::RASTERIZE)
			{

			}
		}
	}
	public function renderMesh($array_of_triangle, $mode)
	{
		$result_array_of_triangle = array();
		foreach ($array_of_triangle as $triangle)
			$this->renderTriangle($triangle, $mode);
	}
	//sauvegarde l'image genere
	public function develop()
	{
		$fd = fopen($this->_filename, 'w+');
		imagepng($this->_image, $fd);
	}

}
?>
