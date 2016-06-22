function confirmDelete(userName) {
    if (confirm('Wollen Sie den Benutzer ' + userName + ' wirklich löschen?')) {
        return true;
    } else {
        return false;
    }
}

