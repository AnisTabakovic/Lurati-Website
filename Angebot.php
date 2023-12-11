<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedCpu = intval($_POST['cpu']);
            $selectedRam = intval($_POST['ram']);
            $selectedSsd = intval($_POST['ssd']);
        
            $totalPrice = $selectedCpu + $selectedRam + $selectedSsd;
            
            
        }
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


        ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">        
        <label for="cpu">CPU (Cores): </label>
        <select id="cpu" name="cpu">
            <option value="5">1 Core - 5 CHF</option>
            <option value="10">2 Cores - 10 CHF</option>
            <option value="18">4 Cores - 18 CHF</option>
            <option value="30">8 Cores - 30 CHF</option>
            <option value="45">16 Cores - 45 CHF</option>
        </select>
        <label for="ram">RAM (MB):</label>
        <select id="ram" name="ram">
            <option value="5">512 MB - 5 CHF</option>
            <option value="10">1024 MB - 10 CHF</option>
            <option value="20">2048 MB - 20 CHF</option>
            <option value="40">4096 MB - 40 CHF</option>
            <option value="80">8192 MB - 80 CHF</option>
            <option value="160">16384 MB - 160 CHF</option>
            <option value="320">32768 MB - 320 CHF</option>
        </select>
        <label for="ssd">SSD (GB):</label>
        <select id="ssd" name="ssd">
            <option value="5">10 GB - 5 CHF</option>
            <option value="10">20 GB - 10 CHF</option>
            <option value="20">40 GB - 20 CHF</option>
            <option value="40">80 GB - 40 CHF</option>
            <option value="120">240 GB - 120 CHF</option>
            <option value="250">500 GB - 250 CHF</option>
            <option value="500">1000 GB - 500 CHF</option>
        </select>
        
        <input type="submit" value="Bestellen">
    </form> 
    <div> 
        <?php echo $totalPrice ?>
    </div>

    
</body>
</html>