<?php

include_once "../models/Cliente.php";

class ClienteController
{
    public static function inserir(Cliente $cliente){
        $sql = "INSERT INTO cliente (nome, telefone, email, endereco) VALUES (";
        $sql .= "'" . $cliente->getNome()        . "', ";
        $sql .= "'" . $cliente->getTelefone()    . "', ";
        $sql .= "'" . $cliente->getEmail()       . "', ";
        $sql .= "'" . $cliente->getEndereco()    . "'";
        $sql .= ")";
    }
}
