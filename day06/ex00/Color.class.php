<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Color.class.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: root </var/mail/root>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/08/14 14:07:16 by root              #+#    #+#             */
/*   Updated: 2019/08/14 14:07:16 by root             ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

Class Color {
public $red = 0;
public $green = 0;
public $blue = 0;
public static $verbose = FALSE;

public static function doc() {
	print("Voici la super doc de la class Color");
	echo file_get_contents("./Color.doc.txt");
}
function __construct(array $kwargs) {
	if (!(isset($kwargs)))
	{
		print("need an array input buddy");
		return;
	}
	if (array_key_exists('red', $kwargs) &&
		array_key_exists('green', $kwargs) &&
		array_key_exists('blue', $kwargs))
	{
		$this->red = $kwargs['red'];
		$this->green = $kwargs['green'];
		$this->blue = $kwargs['blue'];
		if (self::$verbose == TRUE)
			print( "Color( red: ".$this->red.", green: ".$this->green.", blue: ". $this->blue." ) constructed.". PHP_EOL );
	}
	else if (array_key_exists('rgb', $kwargs))
	{
		$this->red = ($kwargs['rgb'] &   0xff0000) >> 16;
		$this->green = ($kwargs['rgb'] & 0x00ff00) >> 8;
		$this->blue = ($kwargs['rgb'] &  0x0000ff) >> 0;
		if (self::$verbose == TRUE)
			print( "Color( red: ".$this->red.", green: ".$this->green.", blue: ". $this->blue." ) constructed.". PHP_EOL );
	}
	else
	{
		print("not enough argument bro");
		return;
	}
}
function __destruct() {
			print( "Color( red: ".$this->red.", green: ".$this->green.", blue: ". $this->blue." ) destructed.". PHP_EOL );
	return;
}
function __toString() {
	return( "Color( red: ".$this->red.", green: ".$this->green.", blue: ". $this->blue." )" );
}

function add($to_add) {
	$this->new_instance = new Color(array('red' => ($this->red + $to_add->red), 'green' => ($this->green + $to_add->green), 'blue' => ($this->blue + $to_add->blue)));
	return $this->new_instance;
}
function sub() {
	print("la fonction sub est call" . PHP_EOL);
}
function mult() {
	print("la fonction mult est call" . PHP_EOL);
}
}

/* $instance1 = new Color( array('rgb' => 0xff00ff) ); */
print("hello" . PHP_EOL);
print(Color::doc());
Color::$verbose = True;

$red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
$green   = new Color( array( 'rgb' => 255 << 8 ) );
$blue    = new Color( array( 'red' => 0   , 'green' => 0   , 'blue' => 0xff ) );

echo "on passe au add". PHP_EOL;

$yellow  = $red->add( $green );
$cyan    = $green->add( $blue );
$magenta = $blue->add( $red );

echo "on passe au white". PHP_EOL;
$white   = $red->add( $green )->add( $blue );

echo "on passe au print". PHP_EOL;
print( $red     . PHP_EOL );
print( $green   . PHP_EOL );
print( $blue    . PHP_EOL );
print( $yellow  . PHP_EOL );
print( $cyan    . PHP_EOL );
print( $magenta . PHP_EOL );
print( $white   . PHP_EOL );

Color::$verbose = False;


?>
