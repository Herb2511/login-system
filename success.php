<?php
// Zeige alle Erfolgreich Meldungen an.
session_start();
?>
<html>

<head>
    <title>Success</title>
    <?php include 'css/styles.css'; ?>
</head>

<body>
    <div class="form">
        <h1><?= 'Success'; ?></h1>
        <p>
            <?php
            if (isset($_SESSION['message']) and !empty($_SESSION['message'])) :
                echo $_SESSION['message'];
            else :
                header("location: index.php");
            endif;
            ?>
        </p>
        <a href="index.php"><button class="button button-block">Home</button></a>
    </div>
</body>

</html>