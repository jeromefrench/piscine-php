// ************************************************************************** //
//                                                                            //
//                                                        :::      ::::::::   //
//   todo.js                                            :+:      :+:    :+:   //
//                                                    +:+ +:+         +:+     //
//   By: jchardin <jerome.chardin@outlook.com>      +#+  +:+       +#+        //
//                                                +#+#+#+#+#+   +#+           //
//   Created: 2019/09/17 10:11:32 by jchardin          #+#    #+#             //
//   Updated: 2019/10/08 11:13:42 by jchardin         ###   ########.fr       //
//                                                                            //
// ************************************************************************** //

var my_listElem;
var my_submitElem;
var my_todoTab = [];
var inner_text = "";
var i;
var cookie_name;
var cookie_value;
var array;

my_listElem = document.getElementById("ft_list");
my_listElem.innerHTML = "bonjour";

my_submitElem = document.getElementById("new");
my_submitElem.addEventListener("click", new_todo);

cookie_value = getCookie("task list");
console.log("cookie value=>" + cookie_value);
if (cookie_value != null)
	my_todoTab = JSON.parse(cookie_value);
var j = 0;
console.log("je print");
for (j = 0 ;my_todoTab[j]; j++)
{
	console.log(my_todoTab[j]);
	add_todo(my_todoTab[j]);
}
console.log("fin");

function getCookie(name) {
  	var value = "; " + document.cookie;
  	var parts = value.split("; " + name + "=");
  	if (parts.length == 2)
  		return parts.pop().split(";").shift();
}

function new_todo()
{
	var text = prompt("Please enter your to do element");
	if (text == "")
		return ;
	else
	{
		my_todoTab.push(text);
		add_todo(text);
	}
}

function add_todo(text)
{
	var NewElement = document.createElement("div");
	NewElement.innerHTML = text;
	NewElement.addEventListener("click", ft_delete);
	my_listElem.insertBefore(NewElement, my_listElem.firstChild);

	//update the task list tab and cookie
	i = 0;
	for (;my_todoTab[i];)
	{
		i++;
	}
	cookie_name = "task list";
	cookie_value = JSON.stringify(my_todoTab);
	document.cookie = "task list=" + cookie_value;
}

function ft_delete()
{
	var text = prompt("Oui ou Non souhaitez-vous supprimer cet element ?");
	console.log("delete==>" + this.innerHTML);

	if (text == "oui")
	{
		this.parentElement.removeChild(this);

		var j;
		for (j = 0 ;my_todoTab[j]; j++)
		{
			if (this.innerHTML == my_todoTab[j])
				my_todoTab.splice(j, 1);
		}

		//update the task list tab and cookie
		i = 0;
		for (;my_todoTab[i];)
		{
			i++;
		}
		cookie_name = "task list";
		cookie_value = JSON.stringify(my_todoTab);
		document.cookie = "task list=" + cookie_value;
	}
}
