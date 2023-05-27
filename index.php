<?php
/**
 * Isso permite que todos os sites e links externos ao seu dominio
 * tenha acesso a sua api.
 * Ex: se o meu site está no site1.com e o site2.com quiser acessar
 * a api que ta no site1.com, se eu não tiver essa configuração, o
 * servidor não vai permitir.
 * *: libera pra todos
 * site2.com, site3.com: site especificado
 */
header('Access-Control-Allow-Origin: *');
//Isso define que tudo vai ser retornado em Json
header('Content-type: application/json');

/**
 * fuso horario
 */
date_default_timezone_set('America/Sao_Paulo');

/**
 * Pegamos tudo que vem na url com o parametro path
 * var_dump($_GET['path']);
 */

/**
 * explodindo tudo que vier no path, vamos explodir
 * a barra. Com isso ele vai criar um array na variavel
 * path.
 * $path = explode("/", $_GET['path']);
 * var_dump($path);
 * var_dump($api);
 */

if (isset($_GET['path'])) { 
    $path = explode("/", $_GET['path']); 
} 
else { 
    echo "Caminho não existe"; exit;
}

if (isset($path[0])) { 
    $api = $path[0]; 
} 
else { 
    echo "Caminho não existe"; exit;
}

if (isset($path[1])) { 
    $acao = $path[1]; 
} 
else { 
    $acao = '';
}

if (isset($path[2])) { 
    $param = $path[2]; 
} 
else { 
    $param = '';
}

$method = $_SERVER['REQUEST_METHOD'];
// var_dump($method);

include_once "classes/db.class.php";
include_once "api/clientes/clientes.php";

