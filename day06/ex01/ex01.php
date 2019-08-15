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
class Vertex() {
	private _x;
	private _y;
	private _z;
	private _w;
	private _color;

	function __construct() {
		echo "construct called". PHP_EOL;
	}
	function __destruct() {
		echo "destruct called". PHP_EOL;
	}
}

?>
