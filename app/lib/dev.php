<?php
ini_set('display_errors',1);
error_reporting(E_ALL| E_STRICT);
ini_set('file_uploads',1);

function debug($str){
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
}