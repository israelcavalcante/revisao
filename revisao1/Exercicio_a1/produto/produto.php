<?php

include_once '../Conexao.php';

class produto {

    protected $id_produto;
    protected $nome;
    protected $id_modelo;
    protected $valor;
    protected $descricao;
    protected $foto;

    /**
     * @return mixed
     */
    public function getId_modelo()
    {
        return $this->id_modelo;
    }
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
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

   
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    

    /**
     * Set the value of id_modelo
     *
     * @return  self
     */ 
    public function setId_modelo($id_modelo)
    {
        $this->id_modelo = $id_modelo;

        return $this;
    }

    /**
     * Get the value of numero_endereco
     */ 
    public function getNumero_endereco()
    {
        return $this->numero_endereco;
    }

    /**
     * Set the value of numero_endereco
     *
     * @return  self
     */ 
    public function setNumero_endereco($numero_endereco)
    {
        $this->numero_endereco = $numero_endereco;

        return $this;
    } 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id_produto
     */ 
    public function getId_produto()
    {
        return $this->id_produto;
    }

    /**
     * Set the value of id_produto
     *
     * @return  self
     */ 
    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }



    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from produto order by nome";
        return $conexao->recuperarDados($sql);
    }

    public function carregarPorId($id_produto)
    {
        $conexao = new Conexao();

        $sql = "select * from produto where id_produto = $id_produto";
        $dados = $conexao->recuperarDados($sql);
        
        $this->id_produto = $dados[0]['id_produto'];
        $this->nome = $dados[0]['nome'];
        $this->valor = $dados[0]['valor'];
        $this->descricao = $dados[0]['descricao'];
        $this->id_modelo = $dados[0]['id_modelo'];
        $this->foto = $dados[0]['foto'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $id_modelo  = $dados['id_modelo'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $foto  = $dados['foto'];
        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "insert into produto (nome,
                                    id_modelo, valor, descricao, foto,)
                            values ('$nome', '$id_modelo', '$valor', '$descricao', '$foto')";
//

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_produto = $dados['id_produto'];
        $nome = $dados['nome'];
        $id_modelo  = $dados['id_modelo'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $foto = $dados['foto'];
        $this->uploadFoto();

        $conexao = new Conexao();

        $sql = "update produto set
        nome = '$nome',  
        id_modelo = '$id_modelo', 
        valor = '$valor',
        descricao = '$descricao',
        foto = '$foto'
        where id_produto = '$id_produto'";

        return $conexao->executar($sql);
    }

    public function excluir($id_produto)
    {
        $conexao = new Conexao();

        $sql = "delete from produto where id_produto = $id_produto";
        return $conexao->executar($sql);
    }

     public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM produto WHERE nome = '$nome'";

        $dados = $conexao->recuperarDados($sql);

        return (int) $dados[0]['qtd'];

    }
    public function uploadFoto(){

        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK)
        {
        $origem = $_FILES['foto']['tmp_name'];
        $destino = '../upload/produto/' . $_FILES['foto']['name'];
        move_uploaded_file($origem, $destino);
        }
    }
}