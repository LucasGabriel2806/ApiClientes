<?php
// var_dump($acao);
if ($acao == '' && $param == '') {
    echo json_encode(['ERRO' => 'Caminho não encontrado!']);
}

if ($acao == 'update' && $param == '') {
    echo json_encode(['ERRO' => "É necessário informar um cliente."]);
}

if ($acao == 'update' && $param != '') {
    
    array_shift($_POST);
    // var_dump($_POST);

    $sql = "UPDATE clientes SET ";
     
    $contador = 1;
    foreach (array_keys($_POST) as $indice) {
        if(count($_POST) > $contador) {
        $sql .= "{$indice} = '{$_POST[$indice]}', ";
    } else {
        $sql .= "{$indice} = '{$_POST[$indice]}' ";
    }
    $contador++;
    }

    $sql .= "WHERE id={$param}";

    // var_dump($sql);

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    // var_dump($sql);

    if ($exec) {
        echo json_encode(["dados" => 'Dados atualizados com sucesso.']);
    } else {
        echo json_encode(["dados" => 'Houve algum erro ao atualizar os dados.']);
    }
}