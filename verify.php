<?php
// Verifiziert die registrierte User E-Mail Adresse. Der Link zu dieser Seite ist in der register.php E-Mail Nachricht eingefügt.
require 'db.php';
session_start();

// Sicherstellen, dass email und hash Variable nicht leer sind.
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {

    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    // Wähle User mit passender E-Mail Adresse und hash, die ihren Account noch nicht verifiziert haben (active = 0).
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ($result->num_rows == 0) {

        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    } else {
        $_SESSION['message'] = "Your account has been activated!";

        //  Den User Status auf aktiv setzen (active = 1)
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;

        header("location: success.php");
    }
} else {
    $_SESSION['message'] = "Invalid parameters provided for acccount verification";

    header("location: error.php");
}
