<?php
/**
 * Processando os dados de produto
 * 
 */
include_once 'produto.php';
include_once '../modelo/modelo.php';

$produto = new produto();
$modelo = new modelo();

switch ($_GET['acao']) {
    case 'salvar':

        $origem = $_FILES['foto']['tmp_name'];
        $destino = '../upload/produto/' . $_FILES['foto']['name'];
        move_uploaded_file($origem, $destino);

        if (!empty($_POST['id_produto'])) {
            $produto->alterar($_POST);
        } else {
            $produto->inserir($_POST);
        }
        break;
    case 'excluir':
        $produto->excluir($_GET['id_produto']);

        break;

    case 'verificar_nome':

        $existe = $produto->existeNome($_GET['nome']);
        if ($existe) {
            echo "Existe $existe no banco cadastradas...";
        }

        die;

}





header('location: index.php');