<?php
// Passwort zurücksetzen. Der Link dieser Seite ist in der Datei forgot.php eingebunden.

require 'db.php';
session_start();

// Sicherstellen, dass email und hash Variablen nicht leer sind.
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    // Sicherstellen, dass User email mit passendem hash existiert.
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash = '$hash'");

    if ($result->num_rows == 0) {
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
} else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");
}
?>
<html>

<head>
    <title>Reset your password</title>
    <?php include 'css/styles.css'; ?>
</head>

<body>
    <div class="form">

        <h1>Choose your new Password</h1>

        <form action="reset_password.php" method="post">

            <!-- This input field is needed, to get the email of the user -->
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="hidden" name="hash" value="<?= $hash ?>">


            <div class="field-wrap">
                <label>
                    New Password<span class="req">*</span>
                </label>
                <input type="password" required name="newpassword" autocomplete="off" />
            </div>

            <div class="field-wrap">
                <label>
                    Confirm New Password<span class="req">*</span>
                </label>
                <input type="password" required name="confirmpassword" autocomplete="off" />
            </div>

            <button type="submit" class="button button-block" name="reset">Apply</button>

        </form>

    </div>

</body>

</html>