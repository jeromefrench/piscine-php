<?php


class Camera
{
	public static $verbose = false;
	private $_origin;
	private $_orientation;
	private $_width;
	private $_height;
	private $_fov;
	private $_far;

	public function __construct(array $kwargs)
	{
		//test
		$this->test($kwargs);
		$this->_origin = $kwargs['origin'];  // vertex de positionement de la camera
		$this->_orientation = $kwargs['orientation']; // matrix de rotation pour orienter la camera

		//on construit le vecteur v a partir du vertex de position
		$v  = new Vector( array( 'dest' => $this->_origin ) );
		//on construit la matrice de translation a partire du vecteur v
		echo "Origine:";
		print $this->_origin;
		echo PHP_EOL;
		$T = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc'=> $v));
		/* print $T; */

		//on calul le vecteur oppose a v
		$oppv = $v->opposite();
		//on construit tT la matrice de translation inversse
		$tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc'=> $oppv));
		echo "+ tT:".PHP_EOL;
		print $tT;

		//la matrice de rotation R on fait la symetrie des diagonale les x devienne y
		$tR = Matrix::symetrie_diagonal($this->_orientation);
		echo "+ tR:".PHP_EOL;
		print $tR;

		//on construit la matrice de view!!!!
		$tR = $tR->mult($tT);
		echo "+ tR->mult(\$tT):".PHP_EOL;
		print $tR;
		$this->_orientation = $kwargs['orientation']; // matrix de rotation pour orienter la camera

		$this->_width = $kwargs['width'];
		$this->_height = $kwargs['height'];
		$this->_fov = $kwargs['fov'];
		$this->_near = $kwargs['near'];
		$this->_far = $kwargs['far'];


		$matrix_projection = new Matrix( array( 'preset' => Matrix::PROJECTION,
						'fov' => $this->_fov,
						'ratio' => ($this->_width / $this->_height),
						'near' => $this->_near,
						'far' => $this->_far ) );

		echo "+ Proj".PHP_EOL;
		print $matrix_projection;

		if (verbose)
		{
			echo "je construct";
		}
	}

	public function watchVertex(Vertex $worldVertex)
	{
		//local vertex
			//Model matrix
		//WorldVertex
			//View matrix
		$camVertex = $tR->transformVertex($worldVertex);
			//Projection matrix
		$ndcVertex = $matrix_projection->transformVertex($camVertex);
			
			//transformation no matrix involved
		$x = ($ndcVertex->getX() + 1) * $this->_width / 2;
		$y = ($ndcVertex->getY() + 1) * $this->_height / 2;
		$screnVertex = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => 0.0 ) );
		return $screnVertex;
	}

	public function __destruct()
	{
		if (verbose)
		{
			echo "je destruct";
		}
	}

	public function __toString()
	{
		return "to string";
	}
	public static function doc()
	{
		echo "je suis la doc".PHP_EOL.PHP_EOL;
	}
	private function test($kwargs)
	{
		if (!isset($kwargs))
		{
			echo "error 1";
			exit();
		}
		if (isset($keargs['preset'])        &&
			isset($keargs['origin'])        &&
			isset($keargs['orientation'])   &&
			isset($keargs['width'])         &&
			isset($keargs['height'])        &&
			isset($keargs['fov'])           &&
			isset($keargs['near'])          &&
			isset($keargs['far'])  )
		{
			echo "error 2";
			exit();
		}
	}
}

?>
