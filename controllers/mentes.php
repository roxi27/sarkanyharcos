<?php

error_reporting(0);



require_once('common/fileio.php');
require_once('common/validate.php');
require_once('common/url.php');
require_once('common/flash_data.php');

function mentes($nev, $palya, $akadaly, $score) {
  $rendelesek = fajlbol_betolt('data/eredmenyek.json');
  $rendelesek[] = [
    'nev'       => $nev,
    'palya'       => $palya,
    'akadaly' => $akadaly,
    'score'  => $score,
    'id'   => time(),
  ];
  fajlba_ment('data/eredmenyek.json', $rendelesek);
}



  $nev = $_SESSION['felhnev']; 
  $palya= $_POST['palya'];
  $akadaly= $_POST['block'];
  $score=$_POST['score'];
  
  
  mentes($nev, $palya, $akadaly, $score);
  
  $_SESSION['palya']=$_POST['palya'];
  $_SESSION['block']=$_POST['block'];
  
  redirect('legjobbak');