<?php
// var_dump($acao);
if ($acao === '' && $param === '') {
    echo json_encode(['ERRO' => 'Caminho não encontrado!']);
    exit;
}
if ($acao == 'lista' && $param == '') {
        // var_dump("estamos no método get");
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM clientes ORDER BY nome");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

    // print_r($obj);
    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}

if ($acao == 'lista' && $param != '') {
    // var_dump("estamos no método get");
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM clientes WHERE id={$param}");
    $rs->execute();
    $obj = $rs->fetchObject();

    // print_r($obj);
    if ($obj) {
        echo json_encode(["dados" => $obj]);
    } else {
        echo json_encode(["dados" => 'Não existem dados para retornar']);
    }
}