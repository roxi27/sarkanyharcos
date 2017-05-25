<?php

require_once('common/fileio.php');
require_once('common/url.php');
require_once('common/flash_data.php');

function validate($_input, &$data, &$errors, $jelszavak) { 
  $felhnev = trim($_input['felhnev']);
  $jelszo = $_input['jelszo'];
  $email=$_input['email'];
  
  if (strlen($felhnev) == 0) {
    $errors[] = 'Nincs felhnev!';
  } else {
    $data['felhnev'] = $felhnev;
  }
  if (strlen($jelszo) == 0) {
    $errors[] = 'Nincs jelszo!';
  } else {
    $data['jelszo'] = $jelszo;
  }
  if (strlen($email) == 0) {
    $errors[] = 'Nincs email!';
  } else {
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email formátuma rossz!"; 
    }
    else
    {
      $data['email'] = $email;
    }
  }
  if (array_key_exists($felhnev, $jelszavak)) {
    $errors[] = 'Letezo felhnev!';
  }
 
  
  return !(bool)$errors;
}
function mentes($felhnev, $email, $jelszo) {
  $jelsz = fajlbol_betolt('data/jelszavak.json');
  $jelsz[]=[
   'felhnev' => $felhnev ,
    'email' => $email,
    'jelszo'=> md5($jelszo),
  ];
  fajlba_ment('data/jelszavak.json', $jelsz);
}
// Vezérlő

$errors = [];
$data = [];

$jelszavak = fajlbol_betolt('data/jelszavak.json');

if (validate($_POST, $data, $errors, $jelszavak)) {
  $felhnev = $data['felhnev'];
  $jelszo = $data['jelszo'];
  $email=$data['email'];
  
  
 mentes($felhnev, $email, $jelszo);
  redirect('login');
} else {
  set_flash_data('errors', $errors);
  redirect('reg');
}

