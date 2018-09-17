<?php
/**
 * Processando os dados de produto
 * 
 */
include_once 'Produto.php';
include_once '../Modelo/Modelo.php';
include_once '../Marca/Marca.php';

$marca = new Marca();
$produto = new Produto();
$modelo = new Modelo();

switch ($_GET['acao']) {
    case 'salvar':

        $origem = $_FILES['foto']['tmp_name'];
        $destino = '../upload/produtos/' . $_FILES['foto']['name'];
         move_uploaded_file($origem, $destino);

        if (!empty($_POST['id_produtos'])) {
            $produto->alterar($_POST);
        } else {
            $produto->inserir($_POST);
        }
        break;
    case 'excluir':
        $produto->excluir($_GET['id_produtos']);

        break;


}





header('location: index.php');