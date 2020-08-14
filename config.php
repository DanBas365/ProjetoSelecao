<?php
require 'environment.php';
$config = array();

//configurações para localhost
if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/projetoselecao/");
    $config['dbname'] = "projeto_selecao";
    $config['dbhost'] = "localhost";
    $config['dbuser'] = "root";
    $config["dbpass"] = "";
} else{
//dados para o servidor real
}
global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['dbhost'], $config['dbuser'], $config['dbpass']);

} catch (PDOException $e){

}
?>