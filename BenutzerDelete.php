<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angebot Aufheben</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class = "header">
<!-- Logo -->
<a href="index.php" class="logo ">OmniCloud</a>
<!-- Navigation -->
    <nav class = "navMenu">

    <a href="index.php">Home</a>
    <a href="Angebot.php">Angebote</a>
    <a href="Kontakt.php">Kontakt</a>
    <a href="UeberUns.php">Über uns</a>
    <a href="BenutzerDelete.php">Angebot Aufheben</a>
    </nav>
    </header>
<?php
    //Request Methode deklarieren
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $KundeDelte = $_POST["Delete"];
        
        //Kunden.txt auslesen und zu einem Array machen
        $arrayamk = file("Kunden.txt", FILE_IGNORE_NEW_LINES);
        
        foreach ($arrayamk as $key => $line) {
        //Array Loopen und nach Schlüsselwort suchen + Line löschen
        if (strpos($line, $KundeDelte) !== false) {
        unset($arrayamk[$key]);
        }
        }
        //Den Updateten Array wieder in ein File schreiben
        array_push($arrayamk,"\n");
        file_put_contents("Kunden.txt", implode(PHP_EOL, $arrayamk));
    }

?>

<h1>Möchten Sie uns wirklich verlassen?</h1>
<p>Falls Sie unzufrienden mit unserem Angebot sind werden wir Ihnen Umgehend helfen.</p>
<p>Schreiben Sie uns eine E-Mail OmniCloud@kundenservice.ch</p>
<!-- Form -->
<form action="BenutzerDelete.php" method="post">     
    <label for="Delete">Möchten Sie Ihren Benutzer entfernen?</label>
        <input type="text" value="Name eingeben" id="Delete" name="Delete">

        <input type="submit" value="Löschen">
    </form>
</body>
</html>