<?php
include_once 'marca.php';

$marca = new marca();
//print_r($_POST);echo'<br>';
//print_r($_GET);die;

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_marca'])) {
//            print_r($_POST);die;
            $marca->alterar($_POST);
        } else {
//            print_r($_POST);die;
            $marca->inserir($_POST);
        }
        break;
    case 'excluir':
        $marca->excluir($_GET['id_marca']);
        break;
    case 'verificar_sigla':
        $existe = $marca->existeSigla($_GET['id_marca']);

        if ($existe){
            echo "A marca {$_GET['id_marca']} já existe informe outra.";
        }
        die;
    case 'verificar_nome':
        $existe = $marca->existeNome($_GET['nome']);

        if ($existe){
            echo "O nome {$_GET['nome']} já existe informe outra.";
        }
        die;
        die;
        break;
}

header('location: index.php');