<?php

// Browser Session wird gestartet (notwending für die Meldungen und Aktivitäten zum Speichern, löschen und bearbeiten pro Session.)
// session_start();

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));

// Verstecktes Input Feld für die Verknüpfung der ID mit der POST Methode.
$id = 0;

// Erst nach Klicken des "Speichern" Buttons wird der Wert der Variable $update auf "true" gesetzt. Dieser steht anfangs auf "false".
$update = false;

// Rückgabewert für das Einsetzen eines leeren Strings in den Wert "values" im Formular unter index.php.
$produktname = '';
$produktpreis = '';

// Datumsausgabe in der Meldung definieren.
$datum = date("d.m.Y - H:i");

// SPEICHERN
// Überprüfen, ob der Button Name "speichern" mit der Methode "POST" aus dem Formular geklickt wurde und erstellen von Variablen.
if (isset($_POST['speichern'])) {
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];

    // Speichern in die Datenbank.
    $mysqli->query("INSERT INTO produkte (Produktbezeichnung, Produktpreis) VALUES('$produktname', '$produktpreis')") or die($mysqli->error);

    // Meldungen in einer Session über erfolgreiches Speichern mit definierter Bootstrap Klasse "success".
    $_SESSION['messagetop'] = "Produkt $produktname wurde gespeichert am $datum!";
    $_SESSION['msg_type'] = "success";

    // Redirect nach dem Speichern zur index.php Seite.
    header("location: profile.php");
}

// LÖSCHEN
// Überprüfen, ob der Button Name "delete" geklickt wurde und mit der Methode "GET" die Daten löschen.
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM produkte WHERE ProduktID=$id") or die($mysqli->error);

    // Meldungen in einer Session über erfolgreiches Löschen mit definierter Bootstrap Klasse "danger".
    $_SESSION['messagetop'] = "Produkt $produktname wurde am $datum gelöscht!";
    $_SESSION['msg_type'] = "danger";

    // Redirect nach dem Löschen zur index.php Seite.
    header("location: profile.php");
}

// ÄNDERN
// Überprüfen, ob der Button Name "edit" geklickt wurde und mit der Methode "GET" die Daten bearbeiten. Danach wird der Button "Update" in der index.php wieder zu "Speichern" gesetzt.
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM produkte WHERE ProduktID=$id") or die($mysqli->error());

    // Überprüfen, ob die Datei überhaupts existiert.
    if (@count($result) == 1) {
        $row = $result->fetch_array();
        $produktname = $row['Produktbezeichnung'];
        $produktpreis = $row['Produktpreis'];
    }
}

// AKTUALISIEREN
// Überprüfen, ob der Button Name "update" geklickt wurde und mit der Methode "POST" die Daten bearbeiten und zurück zur index.php Seite routen.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];

    $mysqli->query("UPDATE produkte SET Produktbezeichnung='$produktname', Produktpreis='$produktpreis' WHERE ProduktID='$id'") or die($mysqli->error);

    $_SESSION['messagetop'] = "Produkt $produktname wurde am $datum aktualisiert!";
    $_SESSION['msg_type'] = "warning";

    header('location: profile.php');
}

