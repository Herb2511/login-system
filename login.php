<?php
// User Login Prozess. Checkt, ob der User existiert und das Passwort korrekt ist.

// E-Mail Adresse überprüfen, um gegen SQL Angriffe geschützt zu sein.
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows == 0) {
    // User existiert nicht. Fehlermeldung
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
} else {
    // User existiert. User Daten werden in ein Array geschrieben.
    $user = $result->fetch_assoc();

    // User Array zum Testen anzeigen und ausgeben.
    // print_r($user);die;

    if (password_verify($_POST['password'], $user['password'])) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];

        // So wissen wir, dass der User eingeloggt ist. Redirect zur Profil Seite.
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
