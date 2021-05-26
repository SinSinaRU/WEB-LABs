function showCalendar() {
    document.getElementsByName('birth')[0].value = "";
    var elems = document.getElementsByName('birth')[0];
    elems.onfocus = function() {
        var cal = document.getElementsByClassName('calendar')[0];
        cal.style.visibility = "visible";
        cal.style.minheight = 'fit-content';
        createCalendar();
    };
    var close = document.getElementsByClassName('exit')[0];
    close.onclick = function() {
        var main_part = document.getElementsByClassName('main_part')[0];
        main_part.innerHTML = '';
        var cal = document.getElementsByClassName('calendar')[0];
        cal.style.visibility = "hidden";
    }
}

function createCalendar() {
    var calendar = document.getElementsByClassName('main_part')[0];
    var months = new Array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    var years = new Array(2002, 2001, 2000, 1999, 1998, 1997, 1996, 1995, 1994, 1993, 1992, 1991, 1990);
    calendar.innerHTML = '<select name="month" class="select"> </select> <select name="year" class="select"> </select>';
    months.forEach(month => { document.getElementsByName('month')[0].innerHTML += '<option>' + month + '</option>' });
    years.forEach(year => { document.getElementsByName('year')[0].innerHTML += '<option>' + year + '</option>' });
    calendar.innerHTML += '<div class="days">Mon Tue Wed Thu Fri Sat Sun </div>';
    calendar.innerHTML += '<div class="numbers"></div>';
    showDays();
}

function showDays() {
    var selectMonth = document.getElementsByName('month')[0].value;
    var selectYear = document.getElementsByName('year')[0].value;
    var dateFirst = new Date(selectYear, getMonthNum(selectMonth), 1);
    var dayWeekFirst = dateFirst.getDay();
    var dateLast = new Date(selectYear, getMonthNum(selectMonth) + 1, 0).getDate();
    var day = 1;
    if (dayWeekFirst == 0) {
        document.getElementsByClassName('numbers')[0].innerHTML += '<div class="raw"></div>';
        for (var i = 0; i < 6; i++) {
            document.getElementsByClassName('raw')[0].innerHTML += '<div class="num_zero"></div>';
        }
        document.getElementsByClassName('raw')[0].innerHTML += '<div class="num">' + 1 + '</div>';
    } else {
        document.getElementsByClassName('numbers')[0].innerHTML += '<div class="raw"></div>';
        for (var i = 0; i < 7; i++) {
            if (i < dayWeekFirst - 1) {
                document.getElementsByClassName('raw')[0].innerHTML += '<div class="num_zero"></div>';
            } else {
                document.getElementsByClassName('raw')[0].innerHTML += '<div class="num">' + day + '</div>';
                day++;
            }
        }
    }
    var week= 1;      
    while (day < dateLast) {
        document.getElementsByClassName('numbers')[0].innerHTML += '<div class="raw"></div>';
        for (var i = 0; i < 7; i++) {
            if (day > dateLast) {
                document.getElementsByClassName('raw')[week].innerHTML += '<div class="num_zero"></div>';
            } else {
                document.getElementsByClassName('raw')[week].innerHTML += '<div class="num">' + day + '</div>';
                day++;
            }
        }
        week++;
    }
    var selectMonth = document.getElementsByName('month')[0];
    selectMonth.addEventListener("change", function() {
        document.getElementsByClassName('numbers')[0].innerHTML = ' ';
        showDays();
    });
    var selectYear = document.getElementsByName('year')[0];
    selectYear.addEventListener("change", function() {
        document.getElementsByClassName('numbers')[0].innerHTML = ' ';
        showDays();
    });
    var calcDays = document.getElementsByClassName('num');
    for (var i = 0; i < calcDays.length; i++) {
        calcDays[i].onclick = function() {
            var inputBirth = document.getElementsByName('birth')[0];
            var selectMonth = document.getElementsByName('month')[0].value;
            var selectYear = document.getElementsByName('year')[0].value;
            inputBirth.value = this.textContent + ' ' + getMonthNumForInput(selectMonth) + ' ' + selectYear;
            inputBirth.focus();
        };
    }
}

function getMonthNum(selectMonth) {
    switch (selectMonth) {
        case 'January':
            return 0;
        case 'Febuary':
            return 1;
        case 'March':
            return 2;
        case 'April':
            return 3;
        case 'May':
            return 4;
        case 'June':
            return 5;
        case 'July':
            return 6;
        case 'August':
            return 7;
        case 'September':
            return 8;
        case 'October':
            return 9;
        case 'November':
            return 10;
        case 'December':
            return 11;
    }
}

function getMonthNumForInput(selectMonth) {
    switch (selectMonth) {
        case 'January':
            return 'of January';
        case 'Febuary':
            return 'of Febuary';
        case 'March':
            return 'of March';
        case 'April':
            return 'of April';
        case 'May':
            return 'of May';
        case 'June':
            return 'of June';
        case 'July':
            return 'of July';
        case 'August':
            return 'of August';
        case 'September':
            return 'of September';
        case 'October':
            return 'of October';
        case 'November':
            return 'of November';
        case 'December':
            return 'of December';
    }
}