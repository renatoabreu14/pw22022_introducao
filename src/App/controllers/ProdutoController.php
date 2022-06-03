<?php

namespace App\Controllers;

use App\Models\Produto;

class ProdutoController{
    private static $instance;
    private $conexao;

    public static function getInstance(){
        if (self::$instance == null){
            self::$instance = new ProdutoController();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->conexao = Conexao::getInstance();
    }

    public function excluir($produto_id){
        $produto = $this->buscarProduto($produto_id);
        $dir = __DIR__."/../../../views/imagens/produtos/";
        unlink($dir . $produto->getImagem());
        $sql = "DELETE FROM produto WHERE id = :id";
        $statement = $this->conexao->prepare($sql);
        $statement->bindValue(":id", $produto_id);
        return $statement->execute();
    }

    public function inserir(Produto $produto){
        $sql = "INSERT INTO produto (nome, descricao, valor, imagem) 
                VALUES (:nome, :descricao, :valor, :imagem)";
        $statement = $this->conexao->prepare($sql);
        $statement->bindValue(":nome", $produto->getNome());
        $statement->bindValue(":descricao", $produto->getDescricao());
        $statement->bindValue(":valor", $produto->getValor());
        $statement->bindValue(":imagem", $produto->getImagem());

        return $statement->execute();
    }

    public function buscarProduto($produto_id){
        $sql = "SELECT * FROM produto WHERE id = :id";
        $statement = $this->conexao->prepare($sql);
        $statement->bindValue(":id", $produto_id);
        $statement->execute();
        $retornoBanco = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $produto = new Produto();
        foreach ($retornoBanco as $row){
            $produto = $this->preencherProduto($row);
        }
        return $produto;
    }

    public function listar(){
        $sql = "SELECT * FROM produto ORDER BY nome";
        $statement = $this->conexao->query($sql, \PDO::FETCH_ASSOC);
        $lstretorno = array();
        foreach ($statement as $row){
            $lstretorno[] = $this->preencherProduto($row);
        }
        return $lstretorno;
    }

    public function preencherProduto($row){
        $produto = new Produto();
        $produto->setId($row["id"]);
        $produto->setNome($row["nome"]);
        $produto->setDescricao($row["descricao"]);
        $produto->setValor($row["valor"]);
        $produto->setImagem($row["imagem"]);
        return $produto;
    }
}
