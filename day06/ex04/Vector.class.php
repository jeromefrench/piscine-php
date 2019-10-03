<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vector.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jchardin <jerome.chardin@outlook.com>      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/09/14 16:52:09 by jchardin          #+#    #+#             */
/*   Updated: 2019/09/14 16:52:09 by jchardin         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once 'Vertex.class.php';

class Vector {
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	static $verbose = False;
	private $_orig;
	private $_dest;

	function __construct(array $kwarg){
		if (!isset($kwarg))
			return ;
		if (!isset($kwarg['dest']))
		{
			return (NULL);
		}
		else
		{
			$this->_dest = new Vertex(array ('x' => $kwarg['dest']->getX(),
											 'y' => $kwarg['dest']->getY(),
											 'z' => $kwarg['dest']->getZ(),
											 'w' => $kwarg['dest']->getW())
										 );
		}
		if (!isset($kwarg['orig']))
		{
			$this->_orig = new Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1));
		}
		else
		{
			$this->_orig = new Vertex(array ('x' => $kwarg['orig']->getX(),
										 	 'y' => $kwarg['orig']->getY(),
											 'z' => $kwarg['orig']->getZ(),
											 'w' => $kwarg['orig']->getW()));
		}
		$this->_x = $this->_dest->getX() - $this->_orig->getX();
		$this->_y = $this->_dest->getY() - $this->_orig->getY();
		$this->_z = $this->_dest->getZ() - $this->_orig->getZ();
		$this->_w = $this->_dest->getW() - $this->_orig->getW();
		if (self::$verbose)
		{
			/* print ("Vector ( x: ".sprintf("%1.2f", $this->getX()). */
			/* 			   " y: ".sprintf("%1.2f", $this->getY()). */
			/* 			   " z: ".sprintf("%1.2f", $this->getZ()). */
			/* 			   " w: ".sprintf("%1.2f", $this->getW()).") constructed".PHP_EOL); */
		}
	}

	public function magnitude() {   //retourne la longueur (ou norme) du vecteur
		$result = $this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z;
		$result = sqrt($result);
		return ($result);
	}
	public function normalize()// :Vector
	{  //retourne le vecteur normalise
		$vertex = New Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$norm = $this->magnitude();
		if ($norm != 0)
		{
			$vertex->setX($this->_x / $norm);
			$vertex->setY($this->_y / $norm);
			$vertex->setZ($this->_z / $norm);
			$result = new Vector(    array( 'dest' => $vertex)   );
		}
		else
		{
			$result = new Vector(    array( 'dest' => $vertex)   );
		}
		return ($result);
	}
	public function add(Vector $rhs)// :Vector
	{ //somme de deux vecteur
		$vertex = New Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1));
		$vertex->setX($this->_x + $rhs->_x);
		$vertex->setY($this->_y + $rhs->_y);
		$vertex->setZ($this->_z + $rhs->_z);
		$result = new Vector(    array( 'dest' => $vertex)   );
		return ($result);
	}
	public function sub(Vector $rhs)// :Vector
	{ //difference de deux vecteur
		$vertex = New Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1));
		$vertex->setX($this->_x - $rhs->_x);
		$vertex->setY($this->_y - $rhs->_y);
		$vertex->setZ($this->_z - $rhs->_z);
		$result = new Vector(    array( 'dest' => $vertex)   );
		return ($result);
	}
	public function opposite()// :Vector
	{ // le vecteur oppose
		$vertex = New Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1));
		$vertex->setX($this->_x * -1);
		$vertex->setY($this->_y * -1);
		$vertex->setZ($this->_z * -1);
		$result = new Vector(    array( 'dest' => $vertex)   );
		return ($result);
	}
	public function scalarProduct($k)// :Vector
	{ //le produit du vecteur avec un scalaire
		$vertex = New Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1));
		$vertex->setX($this->_x * $k);
		$vertex->setY($this->_y * $k);
		$vertex->setZ($this->_z * $k);
		$result = new Vector(    array( 'dest' => $vertex)   );
		return ($result);
	}
	public function dotProduct(Vector $rhs)// :float
	{  // le produit scalaire
		$result = $this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z;
		return ($result);
	}
	public function cos(vector $rhs)// float
	{ // le cosinus de l'angle entre deux vecteur
		$haut = $this->dotProduct($rhs);
		$bas = $this->magnitude() * $rhs->magnitude();
		if ($bas != 0)
			$result = $haut / $bas;
		else
			$result = 0;
		return ($result);
	}
	public function crossProduct(Vector $rhs)// :Vector
	{ // le prolduit en croix de deux vecteurs
		$vertex = New Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1));
		$vertex->setX($this->_y   *   $rhs->_z   -   $this->_z   *  $rhs->_y    );
		$vertex->setY($this->_z   *   $rhs->_x   -   $this->_x   *  $rhs->_z    );
		$vertex->setZ($this->_x   *   $rhs->_y   -   $this->_y   *  $rhs->_x    );
		$result = new Vector(    array( 'dest' => $vertex)   );
		return ($result);
	}


	function __destruct(){
		if (self::$verbose)
			return ("Vector ( x:".sprintf("%1.2f", $this->getX()).
						    " y:".sprintf("%1.2f", $this->getY()).
						    " z:".sprintf("%1.2f", $this->getZ()).
						    " w:".sprintf("%1.2f", $this->getW())." )".PHP_EOL);
	}
	public function doc(){
		echo file_get_contents("./Vector.doc.txt");
	}
	public function __toString(){
			return ("Vector ( x:".sprintf("%1.2f", $this->getX()).
						    " y:".sprintf("%1.2f", $this->getY()).
						    " z:".sprintf("%1.2f", $this->getZ()).
						    " w:".sprintf("%1.2f", $this->getW())." )");
	}
	public function getX(){
		return ($this->_x);
	}
	public function getY(){
		return ($this->_y);
	}
	public function getZ(){
		return ($this->_z);
	}
	public function getW(){
		return ($this->_w);
	}










}

?>
