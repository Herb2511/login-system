<?php
// Registrierungsprozess: speichern der Benutzerinfos in die Datenbank und sende Bestätigungsmail.

// Session Variablen setzen, die in profile.php benutzt werden
$_SESSION['email'] = $_POST['email'];