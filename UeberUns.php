<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <a href="UeberUns.php">Über uns</a>
    <a href="BenutzerDelete.php">Angebot Aufheben</a>
    </nav>
    </header>
<!-- Kontakt Info über CEO's -->


<div>
  <h1 class = uberuns>  Über uns</p>
  <p class = uberunstext>Willkommen auf unserer Website! Wir sind drei Informatikschüler*innen der Mittelschule Basel im zweiten Jahr. Unser Team bietet eine vielfältige Auswahl an sorgfältig konfigurierten virtuellen Maschinen (VMs) an. Durch unsere gemeinsame Leidenschaft für Technologie und IT sind wir bestrebt, Ihnen hochwertige Lösungen zu präsentieren. Entdecken Sie die Welt der VMs mit unserem Team!<br>
<br>
Ihre Informatik-Schüler*innen,<br>
Anis Tabakovic, Vincent Bernardini, Mirella Damiano</p>
</div>
<p class = kntform> Bei weiteren Fragen oder Anliegnen können Sie uns gerne kontaktieren.</p>
<form action="Formular ist nur fürs Aussehen, nicht Funktional" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="problem">Problem:</label><br>
  <textarea id="problem" name="problem" required></textarea><br>
  <input type="submit" value="Senden">
</form>
<footer> 
<div class="footer">
  <div>
  <a href="Angebote.php">Angebote</a>
  <a href="BenutzerDelete.php">Angebote Aufheben</a>
  <a href="UeberUns.php">   Über uns</a>
</div>
<p>© 2023 OmniCloud GmbH</p>
</div>
</footer>
</body>
</html>