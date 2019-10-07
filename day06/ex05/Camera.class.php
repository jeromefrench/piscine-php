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

	public $tR;
	public $matrix_projection;

	public $view_matrix;

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

		//la matrice de rotation R (this->_orientation) on fait la symetrie des diagonale les x devienne y
		$this->tR = Matrix::symetrie_diagonal($this->_orientation);
		echo "+ tR:".PHP_EOL;
		print $this->tR;

		//on construit la matrice de view!!!!
		$this->view_matrix = $this->tR->mult($tT);
		echo "+ tR->mult(\$tT):".PHP_EOL;
		print $this->tR;

		$this->_width = $kwargs['width'] / 2 ;
		$this->_height = $kwargs['height'] / 2;
		$this->_fov = $kwargs['fov'];
		$this->_near = $kwargs['near'];
		$this->_far = $kwargs['far'];


		$this->matrix_projection = new Matrix( array( 'preset' => Matrix::PROJECTION,
						'fov' => $this->_fov,
						'ratio' => ($this->_width / $this->_height),
						'near' => $this->_near,
						'far' => $this->_far ) );

		echo "+ Proj".PHP_EOL;
		print $this->matrix_projection;

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
		/* $camVertex = $this->tR->transformVertex($worldVertex); */
		$camVertex = $this->view_matrix->transformVertex($worldVertex);
		echo "la cam vertex :";
		print $camVertex;
		echo PHP_EOL;
			//Projection matrix
		$ndcVertex = $this->matrix_projection->transformVertex($camVertex);
echo "le ndc x".$ndcVertex->getX().PHP_EOL;
echo "le ndc y".$ndcVertex->getY().PHP_EOL;
			//transformation no matrix involved
echo PHP_EOL;
		$x = ($ndcVertex->getX() * $this->_ratio);
		$y = ($ndcVertex->getY()) ;
		$screnVertex = new Vertex( array( 'x' => $x, 'y' => $y , 'z' => 0.0 ) );
		return $screnVertex;
	}

	//add pour exos 5
	public function watchMesh($array_of_triangle)// : Vertex  vertex multiply matrix
	{
		echo "Watch Mesh function".PHP_EOL;
		$result_array_of_triangle = array();
		foreach ($array_of_triangle as $triangle)
		{
			echo $triangle->_A->getX();
			$a = $this->watchVertex($triangle->_A);
			$b = $this->watchVertex($triangle->_B);
			$c = $this->watchVertex($triangle->_C);
			$result_triangle = new Triangle( $a,  $b, $c  );
			$result_array_of_triangle[] = $result_triangle;
		}
		return ($result_array_of_triangle);

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
