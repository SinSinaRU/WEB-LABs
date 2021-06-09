const input = document.body.querySelector('.phone');

input.addEventListener('keypress', (evt) => {
    if (evt.keyCode < 47 || evt.keyCode > 57) {
        evt.preventDefault();
    }
})
input.addEventListener('focus', () => {
    if (input.value.length === 0) {
        input.value = '+';
        input.selectionStart = input.value.length;
    }
})

input.addEventListener('click', (evt) => {
    if (input.selectionStart < 1) {
        input.selectionStart = input.value.length;
    }
    if (evt.key === 'Backspace' && input.value.length <= 1) {
        evt.preventDefault();
    }
})

input.addEventListener('blur', () => {
    if (input.value === '+') {
        input.value = '';
    }
})

input.addEventListener('keydown', (evt) => {
    if (evt.key === 'Backspace' && input.value.length <= 1) {
        evt.preventDefault();
    }
})


function validationFormContact(form) {

    var name = [];
    name = document.getElementById("name").value.split(' ');

    if (name.length != 3) {
        window.alert("Неверный формат записи поля ФИО");
        document.getElementById("name").value = "";
        document.getElementById("name").focus();
        return false;
    }

    var number;
    number = document.getElementById("phone").value;
    var myRegPhone = /^\+?[73]{1}?([0-9]{8,10})/;

    if (!myRegPhone.test(number)) {
        window.alert("Неверный формат записи поля Телефон");
        document.getElementById("phone").value = "";
        document.getElementById("phone").focus();
        return false;
    }

    return true;
}

function checkFormContact(form) {
    if (document.getElementById("name").value == "") {
        window.alert("Не введено поле ФИО");
        document.getElementById("name").focus();
        return false;
    };
    if (document.getElementById("email").value == "") {
        window.alert("Не введено поле E-mail");
        document.getElementById("email").focus();
        return false;
    };
    if (document.getElementById("phone").value == "") {
        window.alert("Не введено поле Телефон");
        document.getElementById("phone").focus();
        return false;
    };
    if (document.getElementById("comment").value == "") {
        window.alert("Не введено поле Сообщение");
        document.getElementById("comment").focus();
        return false;
    };

    if (!validationFormContact(form)) {
        return false;
    };
    return true;
};