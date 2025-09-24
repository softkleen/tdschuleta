<?php 
include "acesso_com.php";
include_once "../class/produto.php";

if(isset($_GET)){
    $prod = new Produto();
    if($prod->excluir($_GET['id'])){
        header('location: produtos_lista.php');
    }
}
?>