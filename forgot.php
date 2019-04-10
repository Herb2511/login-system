<?php
// Zurücksetzen des Passworts. Sendet reset.php Passwort Link.
require 'db.php';
session_start();

// Checken, ob das Formular mit der Methode "post" gesendet wurde.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $mysqli->escape_string($POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows == 0) {
        // User existiert nicht.
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    } else {
        // User existiert (num_rows != 0).
        // User wird in ein Array aus Userdaten geschrieben.
        $user = $result->fetch_assoc();

        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session Nachricht auf success.php anzeigen.
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
            . " for a confirmation link to complete your password reset</p>";

        // Sendet Registrierungs Bestätigungslink (reset.php).
        $to = $email;
        $subject = 'Password Reset Link (test)';
        $message_body = '
            Hello ' . $first_name . ',

You have requested passwort reset!

Please click this link to reset your password:

http://localhost/login-system/reset.php?email=' . $email . '&hash=' . $hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
    }
}
?>
<html>

<head>
    <title>Reset your Password</title>
    <?php include 'css/styles.css'; ?>
</head>

<body>
    <div class="form">

        <div class="tab-content">
            <!-- Anmelden -->
            <div id="forgot">
                <h1>Reset your Password</h1>

                <form action="forgot.php" method="post" autocomplete="off">

                    <div class="field-wrap">
                        <label>
                            Email Adress<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name="email" />
                    </div>

                    <button class="button button-block" name="reset">Reset</button>

                </form>
            </div>

        </div>
    </div>


</body>

</html>