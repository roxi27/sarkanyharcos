<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Regisztráció</title>
  <style>
     body{
       background-color: #ffbb99;
    }
  </style>
</head>
<body>
  <h1>Regisztráció</h1>
  
  <?php if ($errors) : ?>
    <ul>
      <?php foreach($errors as $error) : ?>
        <li><?= $error ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  
  <form action="" method="post">
    Felhasználónév:
    <input type="text" name="felhnev"> <br>
     Email:
    <input type="text" name="email"> <br>
    Jelszó:
    <input type="password" name="jelszo"> <br>
    <input type="submit" name="reg" value="Regisztrál">
  </form>
  
</body>
</html>