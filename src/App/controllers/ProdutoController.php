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
