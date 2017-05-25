<?php

require_once('common/fileio.php');
require_once('common/flash_data.php');
require_once('common/auth.php');
require_once('common/url.php');


$palya=$_SESSION['palya'];
$akadaly=$_SESSION['block'];


$osszes_eredmeny=fajlbol_betolt('data/eredmenyek.json');



function legjobb($eredmeny, $palya, $akadaly)
{
    $adott=[];
    foreach ($eredmeny as $e) {
        if($e['palya']===$palya && $e['akadaly']===$akadaly)
        {
            $adott[]=$e;
        }
    }
    return $adott;
}


function cmp($a, $b)
{
    if ($a['score'] == $b['score']) {
        return 0;
    }
    return ($a['score'] > $b['score']) ? -1 : 1;
}

$legjobb=legjobb($osszes_eredmeny, $palya, $akadaly);
usort($legjobb, "cmp");
include('templates/legjobbak.template.php');