<?php

require_once "conecao.php";

sleep(1);

session_start();
$id_loja =  $_SESSION['empresa_id'];

$sql = "select count(distinct fk_cliente) as num from registro_cartaoFidelidade
        inner join cartaoFidelidade cF on registro_cartaoFidelidade.fk_carimbo = cF.id
        inner  join lojas l on cF.fk_loja = l.id where l.id = '$id_loja'";
$query = mysqli_query($conecao,$sql);
$result = mysqli_fetch_assoc($query);

echo $result['num'];