<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Legjobbak</title>
    <style>
      body{
         background-color: #ffbb99;
      }
      h1{
        text-align: center;
        font-size: 40px;
      }
      
    </style>
</head>
<body>
  <h1>A Sárkány harcos kalandjai</h1>

   
      <a href="index.php?logout">Kijelentkezés</a>
    <a href="index.php?jovahagy">Játék</a>
      <hr>
       <h2>A legjobb eredmények a pályán:</h2>
     <ol id="best">
      
    <?php for($i=0; $i<count($legjobb) && $i<10; $i++) : ?>
      <li >
        <?php  $n=$legjobb[$i]?>
        <?= $n['nev'] ?>
        <?= $n['score'] ?>
      </li>
    <?php endfor ?>
  </ol>
 
</body>
</html>