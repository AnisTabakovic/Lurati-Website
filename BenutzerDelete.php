<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class = "navMenu">

<a href="index.php">Home</a>
<a href="Angebot.php">Angebote</a>
<a href="Kontakt.php">Kontakt</a>
<a href="UeberUns.php">Über uns</a>
<a href="BenutzerDelete.php">adwadad</a>
</nav>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $KundeDelte = $_POST["Delete"];

        //Liest die Datei in ein Array
        $arrayamk = file("Kunden.txt", FILE_IGNORE_NEW_LINES);

        // Durchläuft jede Zeile im Array
        foreach ($arrayamk as $key => $line) {
        // Überprüft, ob die Zeile den Namen enthält
        if (strpos($line, $KundeDelte) !== false) {
        // Entfernt die Zeile aus dem Array
        unset($arrayamk[$key]);
        }
        }
        // Schreibt das modifizierte Array zurück in die Datei
        file_put_contents("Kunden.txt", implode($arrayamk));
    }

?>


<form action="BenutzerDelete.php" method="post">     
    <label for="Delete">Möchten Sie Ihren Benutzer entfernen?</label>
        <input type="text" value="Name eingeben" id="Delete" name="Delete">

        <input type="submit" value="Löschen">
    </form>
</body>
</html>