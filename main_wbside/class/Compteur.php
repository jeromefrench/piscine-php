<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Compteur.php                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jchardin <jerome.chardin@outlook.com>      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/09/23 12:22:00 by jchardin          #+#    #+#             */
/*   Updated: 2019/09/23 12:22:00 by jchardin         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */


class compteur {
	public $fichier;

	public function __construct(string $fichier)
	{
		$this->fichier = $fichier;
	}

	public function incrementer() :void
	{
		$compteur = 1;
		if (file_exists($this->fichier))
			compteur = (int)file_get_contents($this->fichier);
		$compteur++;
		file_put_contents($this->fichier, $compteur);
	}

	public function recuperer(): int
	{
		if (!file_exists($this->fichier))
			return 0;
		else
			return file_get_contents($this->fichier);
	}
}



?>
