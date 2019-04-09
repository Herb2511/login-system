<?php
// Hauptseite mit zwei Formularen.,
// Datenbank importieren.
require 'db.php';
// Neue Session starten zum Erstellen von Session Variablen in register.php.
session_start();
?>
<html>

<head>
    <title>Login Formular</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS einbinden. -->
    <?php include 'css/styles.css'; ?>
</head>

<?php
// Checken, ob eins der beiden Formulare mit der Methode "POST" gesendet wurde.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Anmeldeformular
    if (isset($_POST['login'])) {

        require 'login.php';
        // Registrierungsformular
    } elseif (isset($_POST['register'])) {

        require 'register.php';
    }
}
?>

<body>
    <!-- Formular -->
    <div class="form">
        <ul class="tab-group">
            <li class="tab"><a href="#signup">Sign Up</a></li>
            <li class="tab active"><a href="#login">Log In</a></li>
        </ul>

        <div class="tab-content">
            <!-- Anmelden -->
            <div id="login">
                <h1>Welcome Back!</h1>

                <form action="index.php" method="post" autocomplete="off">

                    <div class="field-wrap">
                        <label>
                            Email Adress<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name="email" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name="password" />
                    </div>

                    <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>

                    <button class="button button-block" name="login">Log In</button>

                </form>
            </div>
            <!-- Registrieren -->
            <div id="signup">
                <h1>Sign Up for Free</h1>

                <form action="index.php" method="post" autocomplete="off">

                    <div class="top-row">

                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name='firstname' />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" name='lastname' />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Email Adress<span class="req">*</span>
                            </label>
                            <input type="email" required autocomplete="off" name='email' />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Set a Password<span class="req">*</span>
                            </label>
                            <input type="password" required autocomplete="off" name='password' />
                        </div>

                        <button type="submit" class="button button-block" name="register">Register</button>

                    </div>
                </form>

            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src=""></script>
    <script src="js/index.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>