<?php 

include("header.php");
include("restrito.php");
include("conexao.php");


$nome   = addslashes($_POST['nome']);
$login  = addslashes($_POST['login']);
$senha  = addslashes(sha1($_POST['senha']));
$tipo   = addslashes($_POST['tipo']);

$query = $mysqli->prepare("select id from usuarios where login = '$login' and deleted_at = 0");
$query->bind_result($id);
$query->execute();
$query->store_result();
$result = $query->num_rows;
$query->close();

if($result > 0){
    $exibeMsg = 1;
    
}else{
    
    $queryInsert = $mysqli->prepare("insert into usuarios (nome, login, senha, tipo) values ('$nome', '$login', '$senha', $tipo)");
    $queryInsert->execute();
    $queryInsert->store_result();
    $resultInsert = $queryInsert->affected_rows;

    
    if($resultInsert > 0){
        
        $exibeMsg = 2;
        
    }else{
        
        $exibeMsg = 3;
    }
    
    
    $queryInsert->close();
    
}

$mysqli->close();

?>


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Cadastrar</h1>
                <a href="cadastrar.php" class="btn btn-primary my-3">Voltar</a>
                <?php
                    switch($exibeMsg){
                        case 1:
                            echo '<div class="alert alert-danger">Já existe um cadastro com esse login, tente novamente!</div>';
                            break;
                        case 2:
                            echo '<div class="alert alert-success">Cadastro realizado com sucesso!</div>';
                            break;
                        case 3:
                            echo '<div class="alert alert-danger">Houve um problema no cadastro, tente novamente!</div>';
                            break;    
                    }
                ?>
                
            </div>
        </div>
    </div>
    

<?php include("footer.php")?>