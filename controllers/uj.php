<?php
require_once('common/fileio.php');
require_once('common/validate.php');
require_once('common/url.php');
require_once('common/flash_data.php');

function mentes($meret) {
  $uj = fajlbol_betolt('data/uj.json');
  $uj[] = [
    'meret'       => $meret,
    
  ];
  fajlba_ment('data/uj.json', $uj);
}




  $meret= $_POST['meret'];

  
  
  mentes($meret);
  redirect('jovahagy');
