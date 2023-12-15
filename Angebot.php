
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
<ul>
<li>
    <a href="index.php">Home</a></li>
    <li><a href="Angebot.php">Angebote</a></li>
    <li><a href="Kontakt.php">Kontakt</a></li>
    <li><a href="UeberUns.php">Über uns</a></li>
</ul>
<?php

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

$ArraySmall = implode(";",$SmallServer);
$ArrayMedium = implode(";",$MediumServer);
$ArrayBig = implode(";",$BigServer);
$file="serverleistung.txt";
$AllgemeinServerleistung = "Small".";". $ArraySmall . "\n" ."Medium". ";" . $ArrayMedium . "\n" . "Big". ";" . $ArrayBig . "\n";
file_put_contents($file,$AllgemeinServerleistung);

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
            
            switch (true) {
                case ($selectedCpu <= $smallServerCpu && $selectedRam <= $smallServerRam && $selectedSsd <= $smallServerSsd):
                    echo "The Small Server can accommodate your selection.";
                    $smallServerCpu -= $selectedCpu;
                    $smallServerRam -= $selectedRam;
                    $smallServerSsd -= $selectedSsd;
                    $server = "small";
                    $myfile = fopen("kunden.txt", "a");
                    $all = $server . ";" . $KundeName . ";" . $selectedCpu . ";" . $selectedRam . ";" . $selectedSsd . "\n";
                    fwrite($myfile,$all);
                    print_r($SmallServer);
                    break;
                case ($selectedCpu <= $mediumServerCpu && $selectedRam <= $mediumServerRam && $selectedSsd <= $mediumServerSsd):
                    echo "The Medium Server can accommodate your selection.";
                    $mediumServerCpu -= $selectedCpu;
                    $mediumServerRam -= $selectedRam;
                    $mediumServerSsd -= $selectedSsd;
                    $server = "medium";
                    $myfile = fopen("kunden.txt", "a");
                    $all = $server . ";" . $KundeName . ";" . $selectedCpu . ";" . $selectedRam . ";" . $selectedSsd . "\n";
                    fwrite($myfile,$all);
                    break;
                case ($selectedCpu <= $bigServerCpu && $selectedRam <= $bigServerRam && $selectedSsd <= $bigServerSsd):
                    echo "The Big Server can accommodate your selection.";
                    $bigServerCpu -= $selectedCpu;
                    $bigServerRam -= $selectedRam;
                    $bigServerSsd -= $selectedSsd;
                    $server = "big";
                    $myfile = fopen("kunden.txt", "a");
                    $all = $server . ";" . $KundeName . ";" . $selectedCpu . ";" . $selectedRam . ";" . $selectedSsd . "\n";
                    fwrite($myfile,$all);
                    break;
                default:
                    echo "No server can accommodate your selection.";
                    break;
            }
            
            echo $smallServerCpu;
            echo $smallServerRam;
            echo $smallServerSsd;
        
            $totalPrice = $selectedCpu + $selectedRam + $selectedSsd;

        }

        $daten = file_get_contents("serverleistung.txt");
        $alles = explode(";",$daten);
        $server = $alles[0];

        
        
         

        ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">  
        <label for="KundeName">Geben Sie Ihren Namen ein</label>
        <input type="text" name="KundeName">
        <label for="cpu">CPU (Cores): </label>
        <select id="cpu" name="cpu">
            <option value="1">1 Core - 5 CHF</option>
            <option value="2">2 Cores - 10 CHF</option>
            <option value="4">4 Cores - 18 CHF</option>
            <option value="8">8 Cores - 30 CHF</option>
            <option value="16">16 Cores - 45 CHF</option>
        </select>
        <label for="ram">RAM (MB):</label>
        <select id="ram" name="ram">
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
            <option value="10">10 GB - 5 CHF</option>
            <option value="20">20 GB - 10 CHF</option>
            <option value="40">40 GB - 20 CHF</option>
            <option value="80">80 GB - 40 CHF</option>
            <option value="240">240 GB - 120 CHF</option>
            <option value="500">500 GB - 250 CHF</option>
            <option value="1000">1000 GB - 500 CHF</option>
        </select>
        
        <input type="submit" value="Bestellen">
    </form> 

    <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <h3>PRICING</h3>
  <p class="w3-large">Choose a pricing plan that fits your needs.</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
        <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 10</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-red w3-xlarge w3-padding-48">Pro</li>
        <li class="w3-padding-16"><b>25GB</b> Storage</li>
        <li class="w3-padding-16"><b>25</b> Emails</li>
        <li class="w3-padding-16"><b>25</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 25</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
        <li class="w3-padding-16"><b>50GB</b> Storage</li>
        <li class="w3-padding-16"><b>50</b> Emails</li>
        <li class="w3-padding-16"><b>50</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 50</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-black w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
</div>

    
</body>
</html>