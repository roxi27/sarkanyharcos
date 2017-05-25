<?php

require_once('common/fileio.php');
require_once('common/validate.php');
require_once('common/url.php');
require_once('common/flash_data.php');

 //form parameters captured
	  $BoardSize = $_SESSION['BoardSize'];
	  $BoardSizex =substr($BoardSize, 0, 3);
	  $BoardSizey =substr($BoardSize, 6, 3);
	  $Blocks=  $_SESSION['Blocks'];



/*require_once('common/fileio.php');
require_once('common/validate.php');
require_once('common/url.php');
require_once('common/flash_data.php');

function mentes($nev, $palya, $score) {
  $rendelesek = fajlbol_betolt('data/eredmenyek.json');
  $rendelesek[] = [
    'nev'       => $nev,
    'palya'       => $palya,
    'score'  => $score,
    'id'   => time(),
  ];
  fajlba_ment('data/eredmenyek.json', $rendelesek);
}



  $nev = $_SESSION['felhnev']; 
  $palya= $_POST['palya'];
  $score=$_POST['score'];
  
  mentes($nev, $palya, $score);*/
  
  include('templates/alapbol.template.php');