<?php
session_start();
session_destroy();

echo "Logout erfolgreich.";

// Nach drei Sekunden wird die index.php neu geladen.
header("refresh:2; url=index.php");
