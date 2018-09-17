<?php
// Incluindo a classe de produto
include_once 'Produto.php';

$produto = new Produto();
// Recuperando os dados de produtoes
$aprodutos = $produto->recuperarDados();

// Incluindo o incio da aplicação
include_once '../cabecalho.php';
?>

<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Produtos</h3>
        </div>
    </div>
</div>

    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <a class="btn btn-warning" href="Formulario.php">Novo</a>
                </div>
                <div class="panel-body">
                    <div class="responsive-table">

                        <table id="datatables-example" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th colspan="2" width="5%">Ações</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Descricao</th>
                                <th>Id Modelo</th>
                                <th>Id Marca</th>
                                <th>Foto</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($aprodutos as $produto){
                                echo "
                                    <tr>
                                        <td>
                                            <a href='formulario.php?id_produtos={$produto['id_produtos']}'><span class='icons icon-note'></span></a>
                                        </td>
                                        <td>
                                            <a href='processamento.php?acao=excluir&id_produtos={$produto['id_produtos']}'><span class='fa fa-trash-o'></span></a>
                                        </td>
                                        <td>{$produto['id_produtos']}</td>
                                        <td>{$produto['nome']}</td>
                                        <td>{$produto['valor']}</td>
                                        <td>{$produto['descricao']}</td>
                                        <td>{$produto['id_modelo']}</td>
                                        <td>{$produto['id_marca']}</td>
                                        <td>{$produto['foto']}</td>
                                    </tr>
                                ";
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
// Incluindo o termino da aplciação
include_once '../rodape.php';