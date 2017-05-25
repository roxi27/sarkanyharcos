<?php

require_once('common/fileio.php');

function keres($id) {
  $uzenetek = fajlbol_betolt('data/eredmenyek.json');
  foreach($uzenetek as $n) {
    if ($n['id'] == $id) {
      return $n;
    }
  }
}

$id = $_GET['id'];
$uzenet = keres($id);
echo json_encode($uzenet);
