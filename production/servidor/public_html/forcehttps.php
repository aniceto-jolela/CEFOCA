<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!$_SERVER['HTTPS']){
    $protocolo = "https://";
    header("Location:".$protocolo.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']);
}

?>