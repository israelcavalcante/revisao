<?php
include_once 'Modelo.php';

$modelo = new Modelo();
//print_r($_POST);echo'<br>';
//print_r($_GET);die;

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_modelo'])) {
//            print_r($_POST);die;
            $modelo->alterar($_POST);
        } else {
//            print_r($_POST);die;
            $modelo->inserir($_POST);
        }
        break;
    case 'excluir':
        $modelo->excluir($_GET['id_modelo']);
        break;

//    case 'buscar_marca':
//        $modelo = $modelo->buscar_modelo($_GET['id_marca']);
//        foreach ($modelo as $amodelo) {
//            echo "<option value='{$amodelo['id_modelo']}'>{$amodelo['nome']}</option>";
//
//        }
//        die;
//        break;
//};
        case 'buscar_marca':
        $modelos = $modelo->buscar_marca($_GET['id_marca']);

        foreach ($modelos as $amodelos) {
            echo "<option value='{$amodelos['id_modelo']}'>{$amodelos['nome']}</option>";

        }
        die;
        break;
};

header('location: index.php');