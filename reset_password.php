<?php

// Passwort Rücksetzung Prozess. Speichert ein neues Passwort für den User in die Datenbank.
require 'db.php';
session_start();

// Sicherstellen, dass das Formular mit der Methode post gesendet wurde.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sicherstellen, dass die beiden Passwörter gleich sind.
    if ($_POST['newpassword'] == $_POST['confirmpassword']) {

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);

        // Wir erhalten $_POST['email'] von den versteckten Input Feldern aus reset.php.
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);

        $sql = "UPDATE users SET password='$new_password' WHERE email='$email' AND"
            . "hash='$hash'";

        if ($mysqli->query($sql)) {

            $_SESSION['message'] = "Your password has been reset successfully!";
            header("location: success.php");
        }
    } else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header("location: error.php");
    }
}
