<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
          <meta charset="utf-8" />
          <title>Kino Bilecik</title>
          <link rel="stylesheet" href="style.css" />
          <link rel="stylesheet" href="css/fontello.css" />
          <link href="https://fonts.googleapis.com/css?family=Lato:400,900|Raleway:400,900&amp;subset=latin-ext" rel="stylesheet" />
  </head>
  <body>
     <header>
        <h1 class="logo"><i class="icon-video-2"></i> Kino Bilecik</h1>

        <nav id="topnav">
          <ul class="menu">
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="repertuar.php">Repertuar</a></li>
            <li><a href="cennik.php">Cennik</a></li>
            
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="<?php if (!isset($_SESSION['user'])) {
              print 'logowanie.php">Zaloguj się</a></li>';
            } elseif (isset($_SESSION['isAdmin'])) {
              print 'panel.php">Panel admina</a></li>';
            } else {
              print 'panel.php">Panel użytkownika</a></li>';} ?>
            
          </ul>
        </nav>
     </header>
     <div class="content">
     <main>
     <header>
        <h2>Cennik</h2>

      </header>
      <article class="zapowiedzi">
          <?php
              $db = new PDO('sqlite:bazakina.db');
              $price_query = ($db->query("select * from pricelist"));
              print '<table><tr><th>Lp</th><th>Rodzaj biletu</th><th>Cena</th></tr>';
              while ($r = $price_query->fetch()){
                
                print'<tr><td>'.$r['id_tic'].'</td><td>'.$r['type'].'</td><td>'.$r['price'].'</td></tr>';
              }
              print '</table>';
          ?>
      </article>
     </main>
     </div>
     
    <footer>
      <div class="socials">
            <div class="fb">
              <i class="icon-facebook-official"></i>
            </div>
            <div class="tw">
              <i class="icon-twitter"></i>
            </div>
            <div class="insta">
              <i class="icon-instagram"></i>
            </div>            
      </div> 

      <div class="info">
Zapraszamy na seanse w naszym kinie!
      </div>

    </footer>
  </body>
  
</html>