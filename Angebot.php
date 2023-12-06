<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="navbar">
          <div class="container nav-container">
              <input class="checkbox" type="checkbox" name="" id="" />
              <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
              </div>  
            <div class="logo">
              <h1>Omni Cloud</h1>
            </div>
            <div class="menu-items">
              <li><a href="index.php">Home</a></li>
              <li><a href="Angebot.php">Angebot</a></li>
              <li><a href="UeberUns.php">Über uns</a></li>
              <li><a href="Kontakt.php">Kontakt</a></li>
            </div>
          </div>
        </div>
      </nav>
      <form action="process.php" method="post">
        <label for="cpu">CPU (Cores):</label>
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
</body>
</html>