<?php

/**
 * Description of DB
 *
 * @author Aniceto Jolela
 */

    
session_start();

//Importa varias classes
function __autoload($nome_classe){
    require_once '../classes/'.$nome_classe.'.class.php';
}

//Constantes

defined('conectar_BD_HOST') || define('conectar_BD_HOST', 'localhost');
defined('conectar_BD_USER') || define('conectar_BD_USER', 'root');
defined('conectar_BD_NAME') || define('conectar_BD_NAME', 'cefoca');
defined('conectar_BD_PASS') || define('conectar_BD_PASS', '');

function con(){
    try {
        return new PDO('mysql:host='.conectar_BD_HOST.';dbname='.conectar_BD_NAME,conectar_BD_USER,conectar_BD_PASS,array(PDO::ATTR_PERSISTENT=>true,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"));       
    } catch (Exception $erro) {
        echo 'NÃO FOI POSSIVEL CONECTAR AO SERVIDOR';
        //echo $erro->getMessage();
        exit();
    }

}

//Controle de erro de banco de dados no Ajax
$r = array();

function returnAjax($r,$res){
    $r['numero'] = $res;
    echo json_encode($r);
    exit;
}
