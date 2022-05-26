<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Models\Produto;
use App\Controllers\ProdutoController;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
include_once "menu.php";
?>
<div class="container">
    <div class="row">
        <h4>Cadastro de Produtos</h4>
    </div>
    <div class="row">

        <?php
        //singleton
        //insert into cliente (nome, telefone, email, endereco) values ('renato', '64992481630', 'renato.abreu@ifg.edu.br', 'Rua x Ny')
        $sucesso = false;
        if (isset($_POST['enviar'])){

            $produto = new Produto();
            $produto->setNome($_POST['nome']);
            $produto->setDescricao($_POST['descricao']);
            $produto->setValor($_POST['valor']);
            $produto->setImagem($_POST['imagem']);


            if (ProdutoController::getInstance()->inserir($produto)){
                $sucesso = true;
            }
        }

        if ($sucesso) {
            ?>
            <div class="alert alert-primary" role="alert">
                Produto inserido com sucesso!
            </div>
            <?php
        }
        ?>
        <form action="#" method="post" class="col s6 ">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="nome" required>
                    <label for="icon_prefix">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                    <textarea id="icon_prefix" class="materialize-textarea" name="descricao" required></textarea>
                    <label for="icon_prefix">Descricão</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">price_change</i>
                    <input id="icon_prefix" type="number" class="validate" name="valor" required>
                    <label for="icon_prefix">Valor</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">

                    <div class="file-field input-field">
                        <div class="btn black">
                            <span>Imagem</span>
                            <input type="file" multiple name="imagem">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-6">
                    <a href="list-usuario.php" class="btn waves-effect waves-light red"><i class="material-icons left">cancel</i>Cancelar</a>
                </div>
                <div class="col col-6">
                    <button class="btn waves-effect waves-light" type="submit" name="enviar">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
