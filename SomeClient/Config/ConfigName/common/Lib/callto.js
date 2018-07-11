function call_to(p_this) {
	var primaryElem = $(p_this).up('table').down('input#' + p_this.getAttribute('id_primary'));
	var addlElem = $(p_this).up('table').down('input#' + primaryElem.getAttribute('id_addl'));
	var number = primaryElem.getAttribute('phone_value'); 
	var addlnumber = '';
	if (addlElem != undefined) {
		addlnumber = addlElem.getAttribute('phone_value');
	}
	if ((number == '') && (addlnumber == '')) {
		showNotify("Чтобы совершить звонок, необходимо указать номер");
		return;
	}

	if (number != '') {
		wnd_alert('call_to ' + number + ' ' + addlnumber);	
	}
}

function skype_to(number) {
	if (number != '') {
		wnd_alert('skype_to ' + number);	
	}
}
