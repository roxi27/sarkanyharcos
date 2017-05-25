<?php

require_once('common/debugger.php');
require_once('common/fileio.php');
//require_once('common/validate.php');
//require_once('common/url.php');
require_once('common/auth.php');
require_once('common/parameterm.php');

// dumper($_GET);
// dumper($_POST);


/*function osszes_kategoria() {
  $kategoriak = fajlbol_betolt('data/kategoriak.json');
  return $kategoriak;
}

function osszes_termek() {
  $termekek = fajlbol_betolt('data/termekek.json');
  return $termekek;
}

function termekek_by_kategoria($termekek, $kat){
	if(is_null($kat) || is_null($termekek)) return [];
	
	$szurt_termekek = [];
	foreach($termekek as $id => $termek){
		if($termek['kat'] == $kat){
			$szurt_termekek[$id] = $termek;
		}
	}
	
	return $szurt_termekek;
}

function rendeles_mentes($adatok){
	$rendelesek = fajlbol_betolt('data/rendelesek.json');
	$rendelesek[] = [
		'nev'     => $adatok['nev'],
		'cim'     => $adatok['cim'],
		'termek'  => $adatok['termek'],
		'idopont' => time()
	];
	fajlba_ment('rendelesek.json', $rendelesek);
}


function kosarba_tesz($rendelt_termekek, $kosar) {
  $termekek = fajlbol_betolt('data/termekek.json');
  foreach($rendelt_termekek as $id) {
    $kosar[] = [
      'id' => $id,
      'nev' => $termekek[$id]['nev'],
    ];
  }
  return $kosar;
}


$kategoriak = osszes_kategoria();
$osszes_termek = osszes_termek();


$kosar = isset($_SESSION['kosar'])
  ? $_SESSION['kosar']
  : [];

$kat = (int) getParameter('kat', -1);

$termekek = termekek_by_kategoria($osszes_termek, $kat);

$errors = [];
if($_POST){
	/*
	if(!key_exists('termek', $_POST)) {
		$errors[] = 'Nem választottál ki terméket!';
	}
	if($_POST['nev'] === ''){
		$errors[] = 'Nincs név megadva!';
	}
	if($_POST['cim'] === ''){
		$errors[] = 'Nincs cím megadva!';
	}
	
	if(!$errors && isset($_POST['termek'])) {
		//rendeles_mentes($_POST);
		$rendelt_termekek = $_POST['termek'];
		$kosar = kosarba_tesz($rendelt_termekek, $kosar);
		dumper($kosar);
	}
}

$_SESSION['kosar'] = $kosar;

*/

include('templates/index.template.php');


