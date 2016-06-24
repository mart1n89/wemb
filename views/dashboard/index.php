<h2>Dashboard</h2>
<?php if (Session::get('loggedIn') == true): ?>
    <a href="live">Live</a></br>
    <a href="result">Ergebnisse</a>
<?php endif; ?> 