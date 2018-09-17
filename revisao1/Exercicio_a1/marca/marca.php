<?php

include_once '../Conexao.php';

class marca
{

    protected $id_marca;
    protected $nome;

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


    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from marca order by nome";
        return $conexao->recuperarDados($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "select count(*) qtd from marca WHERE nome = '$nome'";
        $dados =  $conexao->recuperarDados($sql);

        return (boolean) $dados[0]['qtd'];
    }

    public function carregarPorId($id_marca)
    {

        $conexao = new Conexao();


        $sql = "select * from marca where id_marca = '$id_marca'";

        $dados = $conexao->recuperarDados($sql);

        $this->id_marca = $dados[0]['id_marca'];
        $this->nome = $dados[0]['nome'];

        return $conexao->executar($sql);
    }

    public function inserir($dados)
    {

        $nome = $dados['nome'];

        $conexao = new Conexao();

        $sql = "insert into marca (nome) values ('$nome')";
//        print_r($sql); die;
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_marca = $dados['id_marca'];
        $nome = $dados['nome'];

        $conexao = new Conexao();

        $sql = "update marca set
                  id_marca = '$id_marca',
                  nome = '$nome'
                where id_marca = '$id_marca'";
//print_r($sql);die;
        return $conexao->executar($sql);
    }

    public function excluir($id_marca)
    {
        $conexao = new Conexao();

        $sql = "delete from marca where id_marca = '$id_marca'";
        return $conexao->executar($sql);
    }
}