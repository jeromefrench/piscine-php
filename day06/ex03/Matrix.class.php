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
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";
	static $verbose = False;

	private $_preset;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_vtc;
	private $_fov;
	private $_ration;
	private $_near;
	private $_far;


	private $_matrix[4][4];

	public function __construct()
	{
		if (!isset($kwarg))
			return ;

		if ($kwarg['preset'] != self::IDENTITY ||
			$kwarg['preset'] != self::SCALE ||
			$kwarg['preset'] != self::RX ||
			$kwarg['preset'] != self::RY ||
			$kwarg['preset'] != self::RZ ||
			$kwarg['preset'] != self::TRANSLATION ||
			$kwarg['preset'] != self::PROJECTION)
			return;
		else
			$this->_preset = $kwarg['preset'];

		if ($this->_preset == self::SCALE)
		{
			if ( unset($kwarg['scale'])
				return "error";
			else
				$this->_scale = $kwarg['scale'];
		}

		if ($this->_preset == self::RX ||
			$this->_preset == self::RY ||
			$this->_preset == self::RZ)
		{
			if ( unset($kwarg['angle'])
				return "error";
			else
				$this->_angle = $kwarg['angle'];
		}

		if ($this->_preset == self::TRANSLATION)
		{
			if ( unset($kwarg['vtc'])
				return "error";
			else
				$this->_vtc = $kwarg['vtc'];
		}


		if ($this->_preset == self::PROJECTION)
		{
			if (unset($kwarg['fov'] || unset($kwarg['ratio'] || unset($kwarg['near'] || unset($kwarg['far'])
				return "error";
			else
				$this->_fov = $kwarg['fov'];
				$this->_ratio = $kwarg['ratio'];
				$this->_near = $kwarg['near'];
				$this->_far = $kwarg['far'];
		}

		
		if ($this->_preset == self::IDENTITY)
		{
			$this->matrix[0][0] = 0;
			$this->matrix[0][0] = 0;
			$this->matrix[0][0] = 0;
			$this->matrix[0][0] = 0;
			$this->matrix[0][0] = 0;
			$this->matrix[0][0] = 0;
			$this->matrix[0][0] = 0;
		}





		if (self::verbose == True)
		{
			echo "";
		}

	}


	private function ft_make_identity()
	{
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
		return "";
	}
	public static function doc()
	{
		echo "doc";
	}
	public function mult(Matrix $rhs) : Matrix
	{
	}
	public function transformVertex(Vertex $vtx) : Vertex
	{
	}


}

?>
