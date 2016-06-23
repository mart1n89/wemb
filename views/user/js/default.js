function confirmDelete(userName) {
    if (confirm(unescape('Wollen Sie den Benutzer ' + userName + ' wirklich löschen?'))) {
        return true;
    } else {
        return false;
    }
}

