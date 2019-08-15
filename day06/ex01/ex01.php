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
class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color = new Color(array('rgb'=> 0xffffff));
	public static $verbose = false;

	function __construct($kwargs) {
		echo "construct called". PHP_EOL;
		if (!isset($kwargs));
			return "need a args buddy";
		if (array_key_exists('x', $kwargs)
			&& array_key_exists('y', $kwargs)
			&& array_key_exists('z', $kwargs)
		)
		{
			_x = $kwargs['x'];
			_y = $kwargs['y'];
			_z = $kwargs['z'];
		}
		else
		{
			return "need a args buddy";
		}
		if (array_key_exists('w', $kwargs))
			_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			_color = $kwargs['color'];
	}
	function __destruct() {
		echo "destruct called". PHP_EOL;
	}
	function __toString() {
	}
}

?>
