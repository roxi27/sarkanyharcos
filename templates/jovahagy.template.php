
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kezdődjön a játék</title>
  <style>
  body{
       background-color: #ffbb99;
    }
    .sarkany2{
        float: right;
    }
    h1{
        font-size: 40px;
 
        text-align: center;
       
    }
    h2{
             display: inline;
    }
    input{
        background: #ffeee6;
    }
    .szabaly{
      float:left;
    }
    </style>
</head>
<body>
  <h1>A sárkányharcos kalandjai</h1>
 
  <br>
  <?php if (azonositott_e()) : ?>
    Üdv, <?= $_SESSION['felhnev'] ?>!
    <a href="index.php?logout">Kijelentkezés</a>
  <?php else: ?>
    <a href="index.php?index">Jelentkezz be!</a>
  <?php endif; ?>
   <hr>
  <div>
  <form action="" method="post"> 
     <h2>Aréna mérete:</h2><select name="BoardSize" id="BoardSize">
	<option>300 X 400</option>
	<option>400 X 500</option>
	<option>500 X 600</option>
   <?php foreach($palyak as $n) : ?>
      <option>
        <?= $n['meret'] ?>
      </option>
    <?php endforeach ?>
	</select>
    <h2> Tereptárgyak száma:</h2>
    <select name="Blocks" id="Blocks">
	<option>4</option>
	<option>5</option>
	<option>10</option>
	</select>
  <input type="submit" value="generál" name="general">
    <input type="submit" value="eredmény" name="eredmeny">
    </form>
    
   
     <?php if($_SESSION['felhnev']==='admin') : ?>
      <form action="index.php?uj" method="post">
       Új pálya mérete: <input type="text" name="meret">
       <input type="submit" value="Új" name="uj">
      </form>
      <?php endif ?>
      
   
    
  <h2>Rekordok:</h2> (név-pont-pálya-akadály)
  <br>
   Pálya:
   
 <ul id="lista">
    <?php foreach($peredmenyek as $n) : ?>
      <li data-id="<?= $n['id'] ?>">
        <?= $n['nev'] ?>
         <?= $n['score'] ?>
          <?= $n['palya'] ?>
           <?= $n['akadaly'] ?>
          
       
      </li>
    <?php endforeach ?>
  </ul>
 
  Saját:
  <ul id="lista">
    <?php foreach($seredmenyek as $n) : ?>
      <li data-id="<?= $n['id'] ?>">
        <?= $n['nev'] ?>
         <?= $n['score'] ?>
          <?= $n['palya'] ?>
           <?= $n['akadaly'] ?>
       
      </li>
    <?php endforeach ?>
  </ul>
  </div>
  <div class="szabaly"><h2>A játék szabályai:</h2>
  <p>Falnak, akadályba, vagy a sárkány testébe ütközve a játék véget ér!</p>
  <p>Tekercsek:</p>
  <ul>
    <li>Bölcsesség(80%): A sárkány 4 hosszal növekszik</li>
    <li>Falánkság(4%): A sárkány 10 hosszal növekszik</li>
    <li>Mohóság(4%): A gyorsaság másfélszeresére nő 5mp-ig</li>
    <li>Lustaság(4%): A gyorsaság másfélszeresére csökken 5mp-ig</li>
     <li>Tükrök(4%):Megcserélődik az irányítás</li>
   
  </ul>
    <p>A tekercsek kioltják egymás hatásait!</p>
  
  </div>
  
  
  
    <div class="sarkany2"><img src="sarkany2.png"</div>
   <script src="js/ajax.js"></script>
  <script src="js/eredmeny.js"></script>
  
</body>
</html>