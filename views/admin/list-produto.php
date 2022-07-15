<?php
require_once __DIR__ . "/../../vendor/autoload.php";
require_once 'verifica-sessao.php';

use App\Models\Produto;
use App\Controllers\ProdutoController;

$exclusao = false;
if (isset($_GET['excluir'])){
    if (ProdutoController::getInstance()->excluir($_GET['produto_id'])){
        $exclusao = true;
    }
}
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
    <?php
        if ($exclusao) {
    ?>
        <div class="alert alert-danger" role="alert">
            Produto excluído com sucesso!
        </div>
    <?php
        }
    ?>
    <div class="row">
        <h4>Lista de Produtos</h4>
    </div>
    <div class="row">
        <div class="col-2">
            <a href="cad-produto.php" class="btn-floating btn-large waves-effect waves-light">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
    <div class="row">
        <?php
        $listaProdutos = ProdutoController::getInstance()->listar();
        ?>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>-</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listaProdutos as $produto){
                echo "<tr>
                        <td><img src='./imagens/produtos/".$produto->getImagem()."' width='150px' height='150px'> </td>
                        <td>".$produto->getNome()."</td>
                        <td>".$produto->getValor()."</td>
                        <td>
                            <a href='list-produto.php?excluir=true&produto_id="
                            .$produto->getId()."' class='waves-effect waves-light btn red' 
                            alt='Excluir' title='Excluir'>
                                <span class='material-icons'>delete</span>
                            </a>
                            <a href='cad-produto.php?alterar=true&produto_id="
                    .$produto->getId()."' class='waves-effect waves-light btn red' 
                            alt='Alterar' title='Alterar'>
                                <span class='material-icons'>edit</span>
                            </a>
                        </td>
                      </tr>";
            }
            ?>


            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
