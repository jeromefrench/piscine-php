// ************************************************************************** //
//                                                                            //
//                                                        :::      ::::::::   //
//   todo.js                                            :+:      :+:    :+:   //
//                                                    +:+ +:+         +:+     //
//   By: jchardin <jerome.chardin@outlook.com>      +#+  +:+       +#+        //
//                                                +#+#+#+#+#+   +#+           //
//   Created: 2019/09/18 18:04:41 by jchardin          #+#    #+#             //
//   Updated: 2019/10/08 13:33:50 by jchardin         ###   ########.fr       //
//                                                                            //
// ************************************************************************** //

$(document).ready(function(){
	$('input[type=submit]').click(myFunction);
	$('#list').on('click', '.todo',  function(e){ ft_delete(e) });

	function myFunction()
	{
		var text = prompt("Please enter your to do element");
		//ajouter a la list csv
		if (text != null)
			$('#list').append('<div class="todo">'+text+'</div>').click(ft_delete);
	}
	function ft_delete(e)
	{
		e.stopPropagation();
		var text = prompt("Etes vous sure ?");
		if (text == "oui")
			e.target.remove();
	}
});

