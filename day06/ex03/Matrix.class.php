<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Matrix.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jchardin <jerome.chardin@outlook.com>      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/09/15 15:09:53 by jchardin          #+#    #+#             */
/*   Updated: 2019/09/15 15:09:53 by jchardin         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */


class Matrix {

	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "RX";
	const RY = "RY";
	const RZ = "RZ";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";
	static $verbose = False;

	private $_preset;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;

	/* private $_matrix[4][4]; */

	private $_matrix = array(array());



	public function __construct($kwarg)
	{
		if (!isset($kwarg))
		{
			echo "probleme\n";
			return ;
		}
		if ($kwarg['preset'] != self::IDENTITY &&
			$kwarg['preset'] != self::SCALE &&
			$kwarg['preset'] != self::RX &&
			$kwarg['preset'] != self::RY &&
			$kwarg['preset'] != self::RZ &&
			$kwarg['preset'] != self::TRANSLATION &&
			$kwarg['preset'] != self::PROJECTION)
		{
			echo "probleme la\n";
			return;
		}
		else
		{
			$this->_preset = $kwarg['preset'];
		}

//preset = SCALE define scale
		if ($this->_preset == self::SCALE)
		{
			if ( !isset($kwarg['scale']))
				return "error";
			else
				$this->_scale = $kwarg['scale'];
		}
//preset = Rotation(RXYZ) define angle
		if ($this->_preset == self::RX ||
			$this->_preset == self::RY ||
			$this->_preset == self::RZ)
		{
			if ( !isset($kwarg['angle']))
				return "error";
			else
				$this->_angle = $kwarg['angle'];
		}

//preset = TRANSLATION define vtc (vecteur de translation)
		if ($this->_preset == self::TRANSLATION)
		{
			if ( !isset($kwarg['vtc']))
				return "error";
			else
				$this->_vtc = $kwarg['vtc'];
		}
//preset = PROJECTION define fov, ratio, near, far
		if ($this->_preset == self::PROJECTION)
		{
			if (!isset($kwarg['fov']) || !isset($kwarg['ratio']) || !isset($kwarg['near']) || !isset($kwarg['far']))
				return "error";
			else
				$this->_fov = $kwarg['fov'];
				$this->_ratio = $kwarg['ratio'];
				$this->_near = $kwarg['near'];
				$this->_far = $kwarg['far'];
		}


		$x = 0;
		while ($x < 4)
		{
			$y = 0;
			while ($y < 4)
			{
				$this->_matrix[$x][$y] = 0.0;
				$y++;
			}
			$x++;
		}
		$this->_matrix[3][3] = 1.0;



		switch ($this->_preset){
		case (self::IDENTITY):
			echo "ello je fait identity\n";
			$this->ft_make_identity();
			break;
		case (self::PROJECTION):
			$this->ft_make_projection($this->_far, $this->_near, $this->_fov, $this->_ratio);
			break;
		case (self::RX):
			$this->ft_make_rx($this->_angle);
			break;
		case (self::RY):
			$this->ft_make_ry($this->_angle);
			break;
		case (self::RZ):
			$this->ft_make_rz($this->_angle);
			break;
		case (self::SCALE):
			$this->ft_make_scale($this->_scale);
			break;
		case (self::TRANSLATION):
			$this->ft_make_translation($this->_vtc);
			break;
		}

			if (self::$verbose == True)
			{
				echo "je creeee\n";
			}
	}

	public function getMat($x, $y)
	{
		return $this->_matrix[$x][$y];
	}



	private function ft_make_identity()
	{
		$this->_matrix[0][0] = 1;
		$this->_matrix[1][1] = 1;
		$this->_matrix[2][2] = 1;
		$this->_matrix[3][3] = 1;
	}
	private function ft_make_projection($far, $near, $fov, $ratio)
	{
	//screen_ratio = height / width;


	$fov = deg2rad($fov);
	$fov_rad = 1.0 / tan($fov / 2.0);


	$this->_matrix[3][2] = 2 * $near * $far / ($near - $far);
	$this->_matrix[2][2] = (-$near - $far) / ($near - $far);
	$this->_matrix[0][0] = $fov_rad / $ratio;   //comprend pas pk / par le ratio
	$this->_matrix[1][1] = $fov_rad;    //OK
	$this->_matrix[2][3] = -1.0;  //OK
	$this->_matrix[3][3] = 0.0;  //OK
	}
	private function ft_make_rx($angle)
	{
		/* $angle = deg2rad($angle); */
		$this->_matrix[0][0] = 1;
		$this->_matrix[1][1] = cos($angle);
		$this->_matrix[2][1] = -sin($angle);
		$this->_matrix[1][2] = sin($angle);
		$this->_matrix[2][2] = cos($angle);
	}
	private function ft_make_ry($angle)
	{
		/* $angle = deg2rad($angle); */
		$this->_matrix[0][0] = cos($angle);
		$this->_matrix[2][0] = sin($angle);
		$this->_matrix[1][1] = 1;
		$this->_matrix[0][2] = -sin($angle);
		$this->_matrix[2][2] = cos($angle);
	}
	private function ft_make_rz($angle)
	{
		/* $angle = deg2rad($angle); */
		$this->_matrix[0][0] = cos($angle);
		$this->_matrix[1][0] = -sin($angle);
		$this->_matrix[0][1] = sin($angle);
		$this->_matrix[1][1] = cos($angle);
		$this->_matrix[2][2] = 1;
	}
	private function ft_make_scale($scale)
	{
		$this->_matrix[0][0] = $scale;
		$this->_matrix[1][1] = $scale;
		$this->_matrix[2][2] = $scale;
		$this->_matrix[3][3] = 1;
	}
	private function ft_make_translation(Vector $vtc)
	{
		$this->_matrix[0][0] = 1;
		$this->_matrix[1][1] = 1;
		$this->_matrix[2][2] = 1;
		$this->_matrix[3][3] = 1;

		$this->_matrix[3][0] = $vtc->getX();
		$this->_matrix[3][1] = $vtc->getY();
		$this->_matrix[3][2] = $vtc->getZ();
		$this->_matrix[3][3] = 1;
	}
	public function __destruc()
	{
		if (self::verbose == True)
		{
			echo "";
		}
	}
	public function __toString()
	{
		return (
			"M | vtcX | vtcY | vtcZ | vtxO\n".
			"-----------------------------\n".
			"x | ".sprintf("%1.2f", $this->getMat(0,0))." | ".sprintf("%1.2f", $this->getMat(1,0))." | ".sprintf("%1.2f", $this->getMat(2,0))." | ".sprintf("%1.2f", $this->getMat(3,0))."\n".
			"y | ".sprintf("%1.2f", $this->getMat(0,1))." | ".sprintf("%1.2f", $this->getMat(1,1))." | ".sprintf("%1.2f", $this->getMat(2,1))." | ".sprintf("%1.2f", $this->getMat(3,1))."\n".
			"z | ".sprintf("%1.2f", $this->getMat(0,2))." | ".sprintf("%1.2f", $this->getMat(1,2))." | ".sprintf("%1.2f", $this->getMat(2,2))." | ".sprintf("%1.2f", $this->getMat(3,2))."\n".
			"w | ".sprintf("%1.2f", $this->getMat(0,3))." | ".sprintf("%1.2f", $this->getMat(1,3))." | ".sprintf("%1.2f", $this->getMat(2,3))." | ".sprintf("%1.2f", $this->getMat(3,3))."\n");
	}
	public static function doc()
	{
		echo "doc";
	}
	public function mult(Matrix $rhs)// : Matrix      matrix multiply matrix
	{
	}
	public function transformVertex(Vertex $vtx)// : Vertex  vertex multiply matrix
	{

	}
}

?>
