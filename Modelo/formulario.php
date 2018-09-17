<?php
include_once 'Modelo.php';
// incluindo os Modelos
$modelo = new Modelo();

// incluindo as Marcas
include_once '../Marca/Marca.php';
$marca = new Marca();

// Recuperando os dados de marcas
$marcas = $marca->recuperarDados();
if (!empty($_GET['id_modelo'])) {
    $modelo->carregarPorId($_GET['id_modelo']);
}

include_once '../cabecalho.php';
?>

    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Modelo</h3>
            </div>
        </div>
    </div>

    <div class="col-md-offset-1 col-md-10 panel">
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">
                <div class="col-md-offset-1 col-md-10 panel-danger">
                    <div id="mensagem"></div>

                </div>

                <form action="processamento.php?acao=salvar" method="post" class="form-horizontal">


                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text" id="nome" name="nome" required
                               value="<?php echo $modelo->getNome(); ?>">
                        <span class="bar"></span>
                        <label>Nome</label>
                    </div>
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <select class="form-text" name="marca" id="marca">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($marcas as $amarcas) { ?>

                                <option value="<?= $amarcas['id_marca'] ?>"><?= $amarcas['nome'] ?></option>

                            <?php } ?>
                        </select>
                        <span class="bar"></span>
                        <label> <i class="icons icon-location-pin"></i>Marca</label>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><span class="fa fa-thumbs-o-up"> </span>
                                Salvar
                            </button>
                            <a class="btn btn-danger" href="index.php"><span class="fa fa-reply"> </span> Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include_once '../rodape.php';
?>