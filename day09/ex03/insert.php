<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   insert.php                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jchardin <jerome.chardin@outlook.com>      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/09/18 18:05:25 by jchardin          #+#    #+#             */
/*   Updated: 2019/09/18 18:05:27 by jchardin         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */


$my_str_csv[0] = "id" ;
$my_str_csv[1] = "ceci est la nouvelle derniere tache";

$fd = fopen('./list.csv', 'a+');
fputcsv($fd, $my_str_csv);



?>
