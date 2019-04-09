<?php
// Verifiziert die registrierte User E-Mail Adresse. Der Link zu dieser Seite ist in der register.php E-Mail Nachricht eingefügt.
require 'db.php';
session_start();

// Sicherstellen, dass email und hash Variable nicht leer sind.
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {

    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

// 




}
