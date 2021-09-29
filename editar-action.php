<?php

include("header.php");
include("restrito.php");
include("conexao.php");

$id     = addslashes($_POST['id']);
$nome   = addslashes($_POST['nome']);
$login  = addslashes($_POST['login']);
$senha  = addslashes(sha1($_POST['senha']));
$tipo   = addslashes($_POST['tipo']);

$querySelect = $mysqli->prepare("select id from usuarios where id = $id");
$querySelect->execute();
$querySelect->store_result();
$resultSelect = $querySelect->num_rows;


if($resultSelect > 0){
    
    if(!empty($nome) and !empty($login) and !empty($tipo)){   
    
        if(!empty($senha)){
            $pass = "senha = '$senha', ";
        }else{
            $pass = "";
        }
        
        
        $queryUpdate = $mysqli->prepare("update usuarios set nome = '$nome', login = '$login', $pass tipo = $tipo where id = $id");
        $queryUpdate->execute();
        $queryUpdate->store_result();
        $resultUpdate = $queryUpdate->affected_rows;

        if($resultUpdate > 0){

            $exibeMsg = 1; 
        }else{

            $exibeMsg = 2;
        } 
        
    }else{
        $exibeMsg = 3;
    }
    
   
    
    
}else{
    
    $exibeMsg = 4;
}


?>

<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Editar</h1>
                <a href="home.php" class="btn btn-primary my-3">Voltar</a>
                <?php
                    switch($exibeMsg){
                        case 1:
                            echo '<div class="alert alert-success">Cadastro alterado com sucesso!</div>';
                            break;
                        case 2:
                            echo '<div class="alert alert-danger">Houve um problema no cadastro, tente novamente!</div>';
                            break;
                        case 3:
                            echo '<div class="alert alert-warning">Um ou mais campos obrigatórios não foram preenchidos, tente novamete!</div>';
                            break;  
                        case 4:
                            echo '<div class="alert alert-danger">Cadastro não localizado!</div>';
                            break;    
                    }
                ?>
                
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>