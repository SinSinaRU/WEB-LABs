var mail_ch = false;
var FIO_ch = false;
var com_ch = false;
var phone_ch = false;


function showTab() {
    document.getElementById("mydropdown").classList.toggle("show");
}

function currentDate() {
    var element = document.getElementById("Date");
    var t = new Date();
    var now = new Date().getDate().toString() + "." + (new Date().getMonth() + 1).toString() + "." + (new Date().getYear() - 100).toString();
    var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    d = t.getDay();
    element.innerText = "Дата: " + now + " " + days[d];
    setTimeout("currentDate()", 1000);
}

/*
function check_fio_test() {
    var fio = document.test.inputFIO.value;
    let array = fio.split(" ");
    if (array.length == 3) {
        for (i = 0; i < array.length; i++) {
            if (array[i] != "") {
                return true;
            } else {
                alert("Неверный формат данных (ФИО)");
                test.inputFIO.focus();
                return false;
            }
        }
    } else {
        alert("Неверный формат данных (ФИО)");
        test.inputFIO.focus();
        return false;
    }
}


function checkbox_check() {
    var isChecked = document.querySelectorAll('input:checked');
    if (isChecked.length > 1) {
        alert("Выберите один Checkbox");
        return false;
    } else if (isChecked.length == 0) {
        alert("Выберите какой-нибудь Checkbox");
        return false;
    } else
        return true;
}

function check_submit() {
    if (!check_fio_test()) { return false; }
    if (!checkbox_check()) { return false; }
    return true;
}

function check_forms() {
    if (!mail_ch) { return false; }
    if (!FIO_ch) { return false; }
    if (!mail_ch) { return false; }
    if (!phone_ch) { return false; }
    let btn = document.getElementById('sumbit');
    btn.removeAttribute('disabled');
    return true;
}

function reset_color() {
    var com = document.formContact.comment;
    var mail = document.formContact.mail;
    var phone = document.formContact.phone;
    var fio = document.formContact.inputFIO;
    var element1 = document.getElementById("comment");
    var element2 = document.getElementById("mail");
    var element3 = document.getElementById("FIO");
    var element4 = document.getElementById("phone");
    element1.innerHTML = "";
    element2.innerHTML = "";
    element3.innerHTML = "";
    element4.innerHTML = "";
    com.style.backgroundColor = "white";
    mail.style.backgroundColor = "white";
    phone.style.backgroundColor = "white";
    fio.style.backgroundColor = "white";
}

function check_submit_cont() {
    if (!check_fio()) { return false; }
    if (!check_phone()) { return false; }
    if (!check_mail()) { return false; }
    if (!check_comment()) { return false; }
    return true;
}

function check_comment() {
    var com = document.formContact.comment.value;
    if (com != "") { return true; } else {
        alert("Заполните комментарий");
        formContact.comment.focus();
        return false;
    }
}

function focusOnComment(x) {
    var com = document.formContact.comment.value;
    var element = document.getElementById("comment");
    if (com != "") {
        x.style.backgroundColor = "green";
        element.innerHTML = "";
        com_ch = true;
        return true;
    } else {
        x.style.backgroundColor = "red";
        element.innerHTML = "Заполните комментарий";
        return false;
    }
}

function check_mail() {
    var mail = document.formContact.mail.value;
    if (mail != "") { return true; } else {
        alert("Заполните email");
        formContact.mail.focus();
        return false;
    }
}


function focusOnMail(x) {
    var mail = document.formContact.mail.value;
    var element = document.getElementById("mail");
    if (mail != "") {
        for (i = 0; i < mail.length; i++) {
            if (mail[i] != "@") {
                x.style.backgroundColor = "red";
                element.innerHTML = "Добавьте символ @";
            } else {
                x.style.backgroundColor = "green";
                element.innerHTML = "";
                mail_ch = true;
                return true;
            }
        }
    }
}

function check_phone() {
    var phone = document.formContact.phone.value;
    let array = phone.split("");
    if ((array.length == 10 || array.length == 11 || array.length == 12) && (array[0] == '+') && (array[1] == '3' || array[1] == '7')) {
        return true;
    } else {
        alert("Неверный формат данных (Номер телефона)");
        formContact.phone.focus();
        return false;
    }
}

function focusOnPhone(x) {
    var phone = document.formContact.phone.value;
    var element = document.getElementById("phone");
    let array = phone.split("");
    if ((array.length == 10 || array.length == 11 || array.length == 12) && (array[0] == '+') && (array[1] == '3' || array[1] == '7')) {
        document.formContact.phone.style.backgroundColor = "green";
        element.innerHTML = "";
        phone_ch = true;
        return true;
    } else {
        x.style.backgroundColor = "red";
        element.innerHTML = "Формат телефона не верный";
        return false;
    }
}

function check_fio() {
    var fio = document.formContact.inputFIO.value;
    let array = fio.split(" ");
    if (array.length == 3) {
        for (i = 0; i < array.length; i++) {
            if (array[i] != "") {
                return true;
            } else {
                alert("Неверный формат данных (ФИО)");
                formContact.inputFIO.focus();
                return false;
            }
        }
    } else {
        alert("Неверный формат данных (ФИО)");
        formContact.inputFIO.focus();
        return false;
    }
}

function focusOnFIO(x) {
    var FIO = document.formContact.inputFIO.value;
    var element = document.getElementById("FIO");
    let array = FIO.split(" ");
    if (array.length == 3) {
        for (i = 0; i < array.length; i++) {
            if (array[i] != "") {
                x.style.backgroundColor = "green";
                element.innerHTML = "";
                FIO_ch = true;
                return true;
            } else {
                x.style.backgroundColor = "red";
                element.innerHTML = "Формат ФИО не верный";
                return false;
            }
        }
    } else {
        x.style.backgroundColor = "red";
        element.innerHTML = "Формат ФИО не верный";
        return false;
    }
}*/
