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

require_once './ex00/Color.class.php';


class Vertex {
	private $_x = 50;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = false;

	function getX() {
		return $this->_x;
	}

	function __construct($kwargs) {
		if (!isset($kwargs))
			return "need an args buddy". PHP_EOL;
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
			return "need a args buddy". PHP_EOL;
		}
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color  = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
	}
	function __destruct() {
		echo "destruct called". PHP_EOL;
	}
	function __toString() {
		echo "__toString called called". PHP_EOL;
	}
	function __get($att) {
		print("Attempt to access ".$att."attribute scipt should die". PHP_EOL);
	}
	function __set($att, $value) {
		print("Attempt to set ".$att."attribute witch value ".$value." scipt should die". PHP_EOL);
	}
}

$vertex = new Vertex(array('x' => 1, 'y' => 2, 'z' => 3));
echo ' $vertex->getX() : '.$vertex->getX().PHP_EOL;

?>
