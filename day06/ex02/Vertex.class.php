<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ex01.php                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: root </var/mail/root>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/08/14 17:17:42 by root              #+#    #+#             */
/*   Updated: 2019/08/14 17:17:42 by root             ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once 'Color.class.php';

class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = False;

	function __construct($kwargs) {
		if (!isset($kwargs))
			return "need a args buddy".PHP_EOL;

		if (array_key_exists('x', $kwargs)
			&& array_key_exists('y', $kwargs)
			&& array_key_exists('z', $kwargs)
		)
		{
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
		}
		else
		{
			return "need a args buddy";
		}
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('rgb'=> 0xffffff));


		if (self::$verbose == True)
		{
			echo ("Vertex( x: ".sprintf("%3.2f", $this->getX()) .  ", y: ".sprintf("%3.2f", $this->getY()) .  ", z: ".sprintf("%3.2f", $this->getZ()) .  ", w: ".sprintf("%3.2f", $this->getW()) .  sprintf(", %s", $this->_color).  " )".  " constructed" . PHP_EOL);
		}
	}
	function __destruct() {
		if (self::$verbose == True)
		{
			echo ("Vertex( x: ".sprintf("%3.2f", $this->getX()) .  ", y: ".sprintf("%3.2f", $this->getY()) .  ", z: ".sprintf("%3.2f", $this->getZ()) .  ", w: ".sprintf("%3.2f", $this->getW()) .  sprintf(", %s", $this->_color).  " )".  " destructed" . PHP_EOL);
		}
	}
	function __toString() {
		if (self::$verbose == True)
		{
		$str = "Vertex( x: ".sprintf("%3.2f", $this->getX()) .
", y: ".sprintf("%3.2f", $this->getY()) .
", z: ".sprintf("%3.2f", $this->getZ()) .
", w: ".sprintf("%3.2f", $this->getW()) .
sprintf(", %s", $this->_color).
" )" ;
		}
		else
		{
		$str = "Vertex( x: ".sprintf("%3.2f", $this->getX()) .
", y: ".sprintf("%3.2f", $this->getY()) .
", z: ".sprintf("%3.2f", $this->getZ()) .
", w: ".sprintf("%3.2f", $this->getW()) .
" )" ;
		}
		return $str;
	}
	public static function doc() {
		echo file_get_contents("./Vertex.doc.txt");
	}
	function getX() {return $this->_x;}
	function getY() {return $this->_y;}
	function getZ() {return $this->_z;}
	function getW() {return $this->_w;}
	function getColor() {return $this->_color;}

	function setX($x) {$this->_x = $x;}
	function setY($y) {$this->_y = $y;}
	function setZ($z) {$this->_z = $z;}
	function setW($w) {$this->_w = $w;}
	function setColor($color) {$this->_color = $color;}
}

?>
