<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 15/09/2018
 * Time: 10:38
 */
include_once '../Conexao.php';

class Produto
{

    protected $id_produtos;
    protected $nome;
    protected $valor;
    protected $descricao;
    protected $id_modelo;
    protected $id_marca;
    protected $foto;

    /**
     * @return mixed
     */
    public function getIdprodutos()
    {
        return $this->id_produtos;
    }

    /**
     * @param mixed $id_produtos
     */
    public function setIdprodutos($id_produtos)
    {
        $this->id_produtos = $id_produtos;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getIdModelo()
    {
        return $this->id_modelo;
    }

    /**
     * @param mixed $id_modelo
     */
    public function setIdModelo($id_modelo)
    {
        $this->id_modelo = $id_modelo;
    }

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->id_marca;
    }

    /**
     * @param mixed $id_marca
     */
    public function setIdMarca($id_marca)
    {
        $this->id_marca = $id_marca;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }



    public function recuperarDados(){
        $conexao = new Conexao();

        $sql = "SELECT * FROM produtos ORDER BY id_produtos";

        //echo '<pre>'; print_r($sql); echo '</pre>'; die;

        return $conexao->recuperarDados($sql);
    }

        public function inserir($dados)
        {
        $nome = $dados['nome'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $id_marca = $_POST['marca'];
        $id_modelo = $_POST['modelo'];
        $foto = $_FILES['foto']['name'];
        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "INSERT INTO produtos (nome, valor, descricao, id_marca, id_modelo, foto) values 
                ('$nome', '$valor', '$descricao', '$id_marca', '$id_modelo', '$foto')";


        return $conexao->executar($sql);
    }

    public function uploadFoto(){

        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK)
        {
            $origem = $_FILES['foto']['tmp_name'];
            $destino = '../upload/produtos/' . $_FILES['foto']['name'];
            move_uploaded_file($origem, $destino);
        }
    }

    public function excluir($id_produtos)
    {
        $conexao = new Conexao();

        $sql = "delete from produtos where id_produtos = $id_produtos";
        return $conexao->executar($sql);
    }

    public function carregarModelo($id_marca){

        $conexao = new Conexao();

        $sql = "SELECT * FROM modelo WHERE id_marca = '$id_marca'";

        // echo $sql; die;
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_produtos){
        $conexao = new Conexao();

        $sql = "select * from produtos where id_produtos = $id_produtos";
        $dados = $conexao->recuperarDados($sql);

        $this->id_produtos = $dados[0]['id_produtos'];
        $this->nome = $dados[0]['nome'];
        $this->valor = $dados[0]['valor'];
        $this->descricao = $dados[0]['descricao'];
        $this->id_marca = $dados[0]['id_marca'];
        $this->id_modelo = $dados[0]['id_modelo'];
        $this->foto = $dados[0]['foto'];

    }

    public function alterar($dados){

        $id_produtos = $dados['id_produtos'];
        $nome = $dados['nome'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $id_marca = $dados['id_marca'];
        $id_modelo = $dados['id_modelo'];
        $foto = $dados['foto'];

        $conexao = new Conexao();

        $sql = "update produtos set nome = '$nome', valor = '$valor', descricao = '$descricao', foto = '$foto', id_marca = '$id_marca', id_modelo = '$id_modelo'
        where id_produtos = $id_produtos";

        /*echo $sql; die; MOSTRAR O SQL*/
        return $conexao->executar($sql);
    }





















}