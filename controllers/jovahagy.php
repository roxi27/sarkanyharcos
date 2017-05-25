<?php


require_once('common/fileio.php');

require_once('common/flash_data.php');
require_once('common/auth.php');
require_once('common/url.php');

if (!azonositott_e()) {
  redirect('login');
}

$palyak=fajlbol_betolt('data/uj.json');

  if (isset($_POST['general']))
{

	  $_SESSION['BoardSize']= $_POST['BoardSize'];
	  $_SESSION['Blocks']= $_POST['Blocks'];
	  redirect('alapbol');
}
  
 else if(isset($_POST['eredmeny']))
 {
   $osszes_eredmeny=fajlbol_betolt('data/eredmenyek.json');
   $szuro = $_POST['BoardSize'];
   $szuro2= $_POST['Blocks'];
   $nev=$_SESSION['felhnev']; 
   $peredmenyek=szur($osszes_eredmeny, $szuro, $szuro2);
   $seredmenyek=szur2($osszes_eredmeny, $szuro, $szuro2, $nev);
 }
 else 
 {
   $peredmenyek=[];
   $seredmenyek=[];
 }
 



include('templates/jovahagy.template.php');


function szur($nevjegyek, $szuro, $szuro2) {
  
  $max= [];
  $maxi=0;
  foreach($nevjegyek as $n) {
    if ($n['palya']===$szuro && $n['akadaly']===$szuro2 && $n['score']>$maxi)  {
      $max=[$n];
      $maxi=$n['score'];
     
    }
  }
  return $max;
}


function szur2($nevjegyek, $szuro, $szuro2, $nev) {
  
  $max2= [];
  $maxi=0;
  foreach($nevjegyek as $n) {
    if ($n['nev']===$nev && $n['palya']===$szuro && $n['akadaly']===$szuro2 && $n['score']>$maxi)  {
      $max2=[$n];
      $maxi=$n['score'];
     
    }
  }
  return $max2;
}


