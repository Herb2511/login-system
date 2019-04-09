<?php
// Registrierungsprozess: speichern der Benutzerinfos in die Datenbank und sende Bestätigungsmail.

// Session Variablen setzen, die in profile.php benutzt werden.
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape String Funktion benutzen, um gegen SQL Angriffe geschützt zu sein.
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0, 1000)));

// Checken, ob der User mit der E-Mail Adresse bereits existiert.
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// Wir wissen, ob die User E-Mail Adresses bereits existiert, indem die Spalte > 0 ist.
if ($result->num_rows > 0) {

    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
}

// E-Mail Adresse existiert noch nicht in der Datenbank, weiter....
else {

    // Alle Daten in die Datenbank speichern. Aktiv ist normalerweise 0 (braucht man hier nicht einfügen).
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) "
        . "VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";

    // SPEICHERN
    // User in die Datenbank speichern.
    if ($mysqli->query($sql)) {
        // 0 bis der User seinen Account über verify.php aktiviert.
        $_SESSION['active'] = 0;
        // So wissen wir, dass der User sich eingeloggt hat.
        $_SESSION['logged in'] = true;
        $_SESSION['message'] = "Confirmation link has been sent to $email, please verify your account by clicking on the link in the message!";

        // Sende Registrierung Link zur Bestätigung (verify.php).
        $to = $email;
        $subject = 'Account Verification (test)';
        $message_body = 'Hello ' . $first_name . ', 
        Thank you for signing up!
        
        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email=' . $email . '&hash=' . $hash;

        mail($to, $subject, $message_body);

        header("location: profile.php");
        // Fehlermeldung bei der Registrierung.
    } else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
}
