<?php
// Incluindo a classe de Produto
include_once 'Produto.php';
$produto = new Produto();
// incluindo os modelo
include_once '../Modelo/Modelo.php';
$modelo = new Modelo();
// incluindo as Marcass
include_once '../Marca/Marca.php';
$marca = new Marca();
// Recuprando os dados de municipio
$modelos = $Modelo->recuperarDados();
// Recuperando os dados de marcas
$marcas = $Marca->recuperarDados();
// Decidindo se ira atualizar ou inserir
if (!empty($_GET['id_produto'])) {
    $produto->carregarPorId($_GET['id_produto']);
}
// Incluindo o inicio da aplicação
include_once '../cabecalho.php';
?>
<!-- Criando o Formulario de Produto -->
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft"><span class="fa fa-users"></span> Produtos</h3>
        </div>
    </div>
</div>
<div class="col-md-offset-1 col-md-10 panel">
    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
        <!--Primeira coluna do Formulário  -->
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="processamento.php?acao=salvar" method="post" class="form-horizontal">
                <!-- ID do Produto -->
                <input type="hidden" name="id_produto" value="<?php echo $produto->getId_produto(); ?>">
                <!-- Nome -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="nome" name="nome" required
                           value="<?php echo $produto->getNome(); ?>">
                    <span class="bar"></span>
                    <label> <i class="fa fa-user"></i> Produto</label>
                </div>
                <!-- Valor -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="valor" name="valor" required
                           value="<?php echo $produto->getValor(); ?>">
                    <span class="bar"></span>
                    <label> <i class="icons icon-credit-card"></i> Valor</label>
                </div>
                <!-- Descricao -->
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="descricao" name="descricao" required
                           value="<?php echo $produto->getDescricao(); ?>">
                    <span class="bar"></span>
                    <label> <i class="fa fa-sort-numeric-asc"></i> Descricao</label>
                </div>


                <!-- Foto -->
                <div class="form-group" style="margin-top:40px !important;">
                    <label> <i class="fa fa-file-photo-o"></i> Foto</label>
                    <input type="file" class="form-text" id="foto" name="foto" required
                           value="<?php echo $produto->getFoto(); ?>">
                </div>
        </div>
        <!-- Segunda coluna do Formulário -->
        <div class="col-md-6">
            <!-- CEP -->

            <!-- Marca-->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <select class="form-text" name="marca" id="marca">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($marcas as $amarcas) { ?>

                        <option value="<?= $amarcas['id_marca'] ?>"><?= $amarcas['nome'] ?></option>

                    <?php } ?>
                </select>
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i> Marca</label>
            </div>
            <!-- Modelo -->
            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                <select class="form-text" name="modelo" id="modelo">
                    <option value="">Selecione</option>
                </select>
                <span class="bar"></span>
                <label> <i class="icons icon-location-pin"></i>Modelo</label>
            </div>




            <!-- id_modelo-->
            <input type="hidden" class="form-text" id="modelo" name="modelo" required
                   value="<?php echo $produto->getId_modelo(); ?>">


            <!-- Enviando ou cancelando o Envio -->

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><span class="fa fa-thumbs-o-up"> </span> Salvar
                    </button>
                    <a class="btn btn-danger" href="index.php"><span class="fa fa-reply"> </span> Voltar</a>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
<?php
include_once '../location/scriptCEP.php';
// Incluindo o termino da aplicação
include_once '../rodape.php';
?>

<script>
    $(function () {

        $('#marca').change(function () {

             $('#modelo').load('../modelo/processamento.php?acao=buscar_marca&id_marca=' + $('#marca').val());

        })

    })
</script>