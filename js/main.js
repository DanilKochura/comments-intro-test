function std_phone(name) {   //преобраззование номера к виду +7*********
    var r = /([0-9])+/g, arr = name.match(r), res, str = arr.join('');
    if (name.substr(0, 1) === '+') {
            res = "+" + str;
    } else if (str.substr(0, 1) === '8') {
            res = "+7" + str.substr(1);
    } else {
            res = str;
    }
    return res;
}



function validatePhone(phone){ //проверка корректности номера телефона
 let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
 return regex.test(phone);
}
function validateName(name){ //проверка корректности ФИО
 let regex = /^(^([А-Я][а-я]+)([\s\-]+)([А-Я]?[а-я]+)(([\s\-]+)([А-Я]?[а-я]+))?)|(^([A-Z][a-z]+)([\s\-]+)([A-Z]?[a-z]+))$/;
 return regex.test(name);
}

$('.form').submit(function(e){
	e.preventDefault();
	let email = $('#email').val().trim();
	let phone = $('#phone').val().trim();
	let name = $('#name').val().trim();
	let rate = $('input[name=rating]:checked').val();
	let date  = new Date();
	if (!validatePhone(phone))
	{
  		alert("Введите корректный номер телефона");
  		return;
	}else if(!validateName(name))
	{
		alert("Введите корректные ФИО");
		return;
	}else if(email == '')
	{
		alert("Ввдите email");
		return;
	}else if($('input[type=radio]:checked').size() ==0)
	{
		alert("Оставьте оценку");
		return;
	}
	phone = std_phone(phone);


	$.ajax({
	  url: 'addComent.php',
	  type: 'POST',
	  dataType: 'html',
	  cache: false,
	  data: {'email': email, 'phone': phone, 'name': name, 'rate': rate, 'date': date},
	  success: function(data) {
	    alert(data);
	  },
	});
	

})




 


