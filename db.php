<?php
// Datenbankverbindung aufbauen.
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);