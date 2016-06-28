function confirmDelete(userName) {
    if (confirm(unescape('Wollen Sie den Benutzer ' + userName + ' wirklich loeschen?'))) {
        return true;
    } else {
        return false;
    }
}

