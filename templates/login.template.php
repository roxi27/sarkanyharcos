<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bejelentkezés</title>
  <style>
    body{
       background-color: #ffbb99;
    }
    .sarkany2{
        float: right;
        width: 600px;
        font-size: 20px;
        font-weight: 500;
       
       
    }
    .sarkany{
        float:left;
       
    }
    h1{
      font-size: 40px;
      text-align: center;
    }
    input{
        background: #ffeee6;
    }
    .proba{
      font-size: 20px;
      margin: auto;
      color: #000;
    
    }
  </style>
</head>
<body>
 
  <h2>Login</h2>
  
  <?php if ($errors) : ?>
    <ul>
      <?php foreach($errors as $error) : ?>
        <li><?= $error ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <div>
  <form action="" method="post">
    Felhasználónév:
    <input type="text" name="felhnev"> <br>
    Jelszó:
    <input type="password" name="jelszo"> <br>
    <input type="submit" name="login" value="Belépés">
  </form>
  
  <a href="index.php?reg">Regisztrálj!</a>
  </div>
  <hr>
     <h1>A sárkányharcos kalandjai</h1>
   
   <div class="sarkany"><img src="sarkany.png"></div>
    <div class="sarkany2"><p>Az ősi Kínában – a feljegyzések legalábbis erre utalnak – jóval az időszámításunk előtt volt egy furcsa megmérettetés: kínai vitézek rátermettségüket azzal bizonyították, hogy minél tovább próbálták megülni Chai-Si hegyvidék varázslatos sárkányát. A legjobb vitéz lett az év sárkányharcosa.</p>

<p>A szerencsét próbáló vitézek egy arénánál gyülekeztek. Egyesével ültek fel az aréna bejáratánál a sárkány hátára, majd a sárkányt beengedték az arénába. A cél az volt, hogy a sárkánnyal minél több tekercset gyűjtsön be a vitéz. Egyszerre egy tekercset dobtak az aréna véletlenszerű helyére. Ha a sárkány felvette a tekercset, akkor annak hatására bölcsebb és nagyobb lett. Voltak azonban olyan tekercsek, amelyek egyéb varázslatot tartalmaztak. Az arénában ezek mellett lehettek tereptárgyak is.</p>

<p>A játékban Te a fiatal és ügyes vitézt, Teng Lenget alakítod. Segíts neki sárkányharcossá válni!</p></div>
<a href="http://webprogramozas.inf.elte.hu/ebr/public/storage/tasks/3vkzz825oay8a0xk/vegleges/alapbol.html"class="proba">Próbáld ki a játékot! </a>
  
</body>
</html>