<?php
/**
 * Created by PhpStorm.
 * User: israel
 * Date: 15/09/2018
 * Time: 10:37
 */
include_once '../Conexao.php';
class Modelo
{
    protected $id_modelo;
    protected $nome;
    protected $id_marca;

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

    public function buscar_marca($id_marca){

        $conexao = new Conexao();

        $sql = "select * from modelo where id_marca = '$id_marca'";
        return $conexao->recuperarDados($sql);
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from modelo order by id_modelo";
        return $conexao->recuperarDados($sql);
    }


    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $id_marca = $_POST['marca'];
        $conexao = new Conexao();

        $sql = "insert into modelo (nome, id_marca) values ('$nome', '$id_marca')";
//        print_r($sql); die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_modelo = $dados['id_modelo'];
        $nome = $dados['nome'];
        $id_marca = $dados['id_marca'];

        $conexao = new Conexao();

        $sql = "update modelo set
                  id_modelo = '$id_modelo',
                  nome = '$nome',
                  id_marca = '$id_marca'                  
                where id_modelo = '$id_modelo'";
//print_r($sql);die;
        return $conexao->executar($sql);
    }

    public function excluir($id_modelo)
    {
        $conexao = new Conexao();

        $sql = "delete from modelo where id_modelo = '$id_modelo'";
        return $conexao->executar($sql);
    }
}