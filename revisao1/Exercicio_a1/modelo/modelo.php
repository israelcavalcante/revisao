<?php

include_once '../Conexao.php';

class Modelo
{

    protected $id_modelo;
    protected $nome;
    protected $id_marca;

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
    public function getIdmodelo()
    {
        return $this->id_modelo;
    }

    /**
     * @param mixed $id_modelo
     */
    public function setIdmodelo($id_modelo)
    {
        $this->id_modelo = $id_modelo;
    }


    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from modelo order by nome";
        return $conexao->recuperarDados($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "select count(*) qtd from modelo WHERE nome = '$nome'";
        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }

    public function carregarPorId($id_modelo)
    {

        $conexao = new Conexao();


        $sql = "select * from modelo where id_modelo = '$id_modelo'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_modelo = $dados[0]['id_modelo'];
        $this->nome = $dados[0]['nome'];
        $this->id_marca = $dados[0]['id_marca'];

        return $conexao->executar($sql);
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $id_marca = $dados['id_marca'];
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
    public function buscar_marca($id_marca){

        $conexao = new Conexao();

        $sql = "select * from modelo where id_marca = '$id_marca'";
        return $conexao->recuperarDados($sql);
    }

}