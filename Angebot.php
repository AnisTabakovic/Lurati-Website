
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
    <a href="Kontakt.php">Kontakt</a>
    <a href="UeberUns.php">Über uns</a>
    <a href="BenutzerDelete.php">Angebot Aufheben</a>
    </nav>
    </header>

<?php
//Deklarirung der Server
$SmallServer = [
    "Cores" => 4,
    "Ram"   => 32768,
    "SSD"   => 4000,
];

$MediumServer = [
    "Cores" => 8,
    "Ram"   => 65536,
    "SSD"   => 8000,
];

$BigServer = [
    "Cores" => 16,
    "Ram"   => 131072,
    "SSD"   => 16000,
];

//Direkt am Anfang wird die verfügbare Serverkapazität ausgerechnet
$file = file("Kunden.txt");
foreach ($file as $line) {

$data = explode(";", $line);

//Rechnen der verfübaren Leistung
if ($data[0] == "small") {
    $SmallServer["Cores"] -= $data[2];
    $SmallServer["Ram"] -= $data[3];
    $SmallServer["SSD"] -= $data[4];
}

elseif ($data[0] == "medium") {
    $MediumServer["Cores"] -= $data[2];
    $MediumServer["Ram"] -= $data[3];
    $MediumServer["SSD"] -= $data[4];
}

elseif ($data[0] == "big") {
    $BigServer["Cores"] -= $data[2];
    $BigServer["Ram"] -= $data[3];
    $BigServer["SSD"] -= $data[4];
}

}
                        // Request Method
                        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                        $selectedCpu = intval($_POST['cpu']);
                        $selectedRam = intval($_POST['ram']);
                        $selectedSsd = intval($_POST['ssd']);
                        $KundeName = $_POST["KundeName"];

            
            $smallServerCpu = $SmallServer["Cores"];
            $smallServerRam = $SmallServer["Ram"];
            $smallServerSsd = $SmallServer["SSD"];
            
            $mediumServerCpu = $MediumServer["Cores"];
            $mediumServerRam = $MediumServer["Ram"];
            $mediumServerSsd = $MediumServer["SSD"];
            
            $bigServerCpu = $BigServer["Cores"];
            $bigServerRam = $BigServer["Ram"];
            $bigServerSsd = $BigServer["SSD"];
            
            //Abfrage wo es Platz hat & erstellung eines neuen Kunden
            switch (true) {
                case ($selectedCpu <= $smallServerCpu && $selectedRam <= $smallServerRam && $selectedSsd <= $smallServerSsd):
                    echo "The Small Server can accommodate your selection.";
                    $server = "small";
                    $myfile = fopen("kunden.txt", "a");
                    $all = $server . ";" . $KundeName . ";" . $selectedCpu . ";" . $selectedRam . ";" . $selectedSsd . "\n";
                    fwrite($myfile,$all);
                    break;
                case ($selectedCpu <= $mediumServerCpu && $selectedRam <= $mediumServerRam && $selectedSsd <= $mediumServerSsd):
                    echo "The Medium Server can accommodate your selection.";
                    $server = "medium";
                    $myfile = fopen("kunden.txt", "a");
                    $all = $server . ";" . $KundeName . ";" . $selectedCpu . ";" . $selectedRam . ";" . $selectedSsd . "\n";
                    fwrite($myfile,$all);
                    break;
                case ($selectedCpu <= $bigServerCpu && $selectedRam <= $bigServerRam && $selectedSsd <= $bigServerSsd):
                    echo "The Big Server can accommodate your selection.";
                    $server = "big";
                    $myfile = fopen("kunden.txt", "a");
                    $all = $server . ";" . $KundeName . ";" . $selectedCpu . ";" . $selectedRam . ";" . $selectedSsd . "\n";
                    fwrite($myfile,$all);
                    break;
                default:
                    echo "No server can accommodate your selection.";
                    break;
            }
    } 

?>

<!-- Forum zum bestellen der Server spezifikationen -->
<form class="form-class-name" action="Angebot.php" method="post">  
    <label for="KundeName">Geben Sie Ihren Namen ein</label>
    <input type="text" name="KundeName">
    <label for="cpu">CPU (Cores): </label>
    <select id="cpu" name="cpu">
        <option value="">Wie viele Cores möchten Sie</option>
        <option value="1">1 Core - 5 CHF</option>
        <option value="2">2 Cores - 10 CHF</option>
        <option value="4">4 Cores - 18 CHF</option>
        <option value="8">8 Cores - 30 CHF</option>
        <option value="16">16 Cores - 45 CHF</option>
    </select>
    <label for="ram">RAM (MB):</label>
    <select id="ram" name="ram">
        <option value="">Wie viel Ram möchten Sie</option>
        <option value="512">512 MB - 5 CHF</option>
        <option value="1024">1024 MB - 10 CHF</option>
        <option value="2048">2048 MB - 20 CHF</option>
        <option value="4096">4096 MB - 40 CHF</option>
        <option value="8192">8192 MB - 80 CHF</option>
        <option value="16384">16384 MB - 160 CHF</option>
        <option value="32768">32768 MB - 320 CHF</option>
    </select>
    <label for="ssd">SSD (GB):</label>
    <select id="ssd" name="ssd">
        <option value="">Wie viel Speicher möchten Sie</option>
        <option value="10">10 GB - 5 CHF</option>
        <option value="20">20 GB - 10 CHF</option>
        <option value="40">40 GB - 20 CHF</option>
        <option value="80">80 GB - 40 CHF</option>
        <option value="240">240 GB - 120 CHF</option>
        <option value="500">500 GB - 250 CHF</option>
        <option value="1000">1000 GB - 500 CHF</option>
    </select> 
    <input type="submit" value="Bestellen" > 
</form>  
</body>
</html>