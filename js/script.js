function getValidate(form){
    var login = form.login.value;
    var password = form.password.value;
    var email = form.email.value;
    if(login==""){
	alert("Логин не введен");
	return false;
    }
    if(password == ""){
	alert("Пароль не введен");
	return false;
    }
    if(email == ""){
	alert("E-mail не введен");
	return false;
    }else{
	var regV = /[A-Za-z0-9\-\_]{2,30}\@[A-Za-z0-9\-\_]{2,30}\.[A-Za-z0-9]{2,4}/;
	var result = email.match(regV);
	if(!result){
	    alert("Введите корректный email");
	    return false;
	}

    }
}
function getValidate(form1){
    var name_goods = form.name_goods.value;
    
    if(name_goods==""){
	alert("Введите наименование продукта");
	return false;
    }
	}
}


