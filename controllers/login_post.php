<?php

require_once('common/fileio.php');
require_once('common/url.php');
require_once('common/flash_data.php');

function validate($_input, &$data, &$errors, $jelszavak) { 
  $felhnev = trim($_input['felhnev']);
  $jelszo = $_input['jelszo'];
  $talal=false;
  
  foreach ($jelszavak as $j)
   {
    if ($j['felhnev'] === $felhnev && $j['jelszo']===md5($jelszo))
     {
        $talal=true;
   
    }
}
  if($talal) $errors=[];
  else  $errors[] = 'Nem jó!';
  return !(bool)$errors;
}

// Vezérlő

$errors = [];
$data = [];

$jelszavak = fajlbol_betolt('data/jelszavak.json');

if (validate($_POST, $data, $errors, $jelszavak)) {
  $_SESSION['belepve'] = true;
  $_SESSION['felhnev'] = $_POST['felhnev'];
  
  redirect('jovahagy');
} else {
  set_flash_data('errors', $errors);
  redirect('login');
}



