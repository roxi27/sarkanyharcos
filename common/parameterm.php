<?php

function getParameter($kulcs, $default = null){
    if(isset($_GET[$kulcs]) && $_GET[$kulcs] != '') {
        return $_GET[$kulcs];
    }
    if(isset($_POST[$kulcs]) && $_POST[$kulcs] != '') {
        return $_POST[$kulcs];
    }
    return $default;
}

