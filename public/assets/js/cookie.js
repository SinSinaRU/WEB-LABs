const pages = {
    '': 'Главная',
    'my-interests': 'Интересы',
    'about-me': 'Обо мне',
    'study-plan': 'Учеба',
    'photo-album': 'Фотоальбом',
    'feedback': 'Контакт',
    'test': 'Тест',
    'cookie-history': 'История'
};

function setCookie(name, value, exlpiration_days) {
    exlpiration_seconds = exlpiration_days * 24 * 60 * 60;
    document.cookie = '' + name + '=' + value + ';max-age=' + exlpiration_seconds;
}

function getCookieValue(name) {
    const findeCookie = document.cookie.split(';').find((item) => item.trim().startsWith(name + '='));
    if (findeCookie) {
        return findeCookie.substr(name.length + 2);
    }
    return findeCookie;
}

function getSavedVisitInCookie(pathName) {
    const parseVal = parseInt(getCookieValue(pathName), 10);
    if (isNaN(parseVal)) {
        return 0;
    } else {
        return parseVal;
    }
}

function addVisitSavedInCookie(pathName) {
    setCookie(pathName, getSavedVisitInCookie(pathName) + 1, 1);
}

function getSavedVisitInLocalStorage(pathName) {
    const prepVal = parseInt(localStorage.getItem(pathName), 10);
    if (isNaN(prepVal)) {
        return 0;
    } else {
        return prepVal;
    }
};

function addVisitSavedInLocalStorage(pathName) {
    const oldValue = getSavedVisitInLocalStorage(pathName);
    localStorage.setItem(pathName, oldValue + 1);
}

function getCurrentPageKey() {
    return location.pathname.replace(/^.*[\\/]/, '');
}

addVisitSavedInCookie(getCurrentPageKey())
addVisitSavedInLocalStorage(getCurrentPageKey())

function getPagesKeyLocalStorage() {
    const prepData = [];
    const pagesKey = Object.keys(pages);
    for (let i = 0; i < pagesKey.length; i++) {
        prepData.push([pagesKey[i], getSavedVisitInLocalStorage(pagesKey[i])]);
    }
    return prepData;
}

function getPagesKeyCookies() {
    const prepData = [];
    const pagesKey = Object.keys(pages);
    for (let i = 0; i < pagesKey.length; i++) {
        prepData.push([pagesKey[i], getSavedVisitInCookie(pagesKey[i])]);
    }
    return prepData;
}

function renderTable(sourceData, header) {
    const tmpTable = document.createElement("table");
    tmpTableCaption = document.createElement("caption");
    tmpTableCaption.textContent = header;
    tmpTable.append(tmpTableCaption);
    tmpTable.append(...sourceData.map(elm => {
        const dataString = document.createElement("tr");
        const pagePath = document.createElement("td");
        pagePath.textContent = pages[elm[0]];
        const pageCount = document.createElement("td");
        pageCount.textContent = elm[1];
        dataString.append(pagePath, pageCount);
        return dataString;
    }))
    return tmpTable;
}

function testSession() {
    const isStarted = sessionStorage.getItem('sessionStarted');
    if (!isStarted) {

        const pagesKey = Object.keys(pages);

        pagesKey.forEach((item) => {
            localStorage.setItem(item, 0);
        });
        sessionStorage.setItem('sessionStarted', true);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    testSession();
    anhorSession = document.getElementById("history-session");
    if (anhorSession) {
        anhorSession.append(renderTable(getPagesKeyLocalStorage(), '«История текущего сеанса»'));
    };
    anhorAll = document.getElementById("history-all");
    if (anhorAll) {
        anhorAll.append(renderTable(getPagesKeyCookies(), '«История за все время»'));
    };
})