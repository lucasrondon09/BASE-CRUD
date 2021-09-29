<?php
include("header.php");
include("conexao.php");

$login = addslashes($_POST['login']);
$senha = addslashes(sha1($_POST['senha']));

$query = $mysqli->prepare("select id, nome, login, senha, tipo from usuarios where login = '$login' and senha = '$senha' and deleted_at = 0");
$query->bind_result($id, $nome, $login, $senha, $tipo);
$query->execute();
$query->store_result();
$result = $query->num_rows;

if($result > 0){


    $query->fetch();
    session_start();
    
    $_SESSION['idUser'] = $id;
    $_SESSION['nome']   = $nome;
    $_SESSION['login']  = $login;
    $_SESSION['senha']  = $senha;
    $_SESSION['tipo']   = $tipo;
    
    header("Location:home.php");
    
}else{
    
    echo '<div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-md-6">
                        <div class="alert alert-danger">Usuário ou senha digitados incorretamente, tente novamente!</div>
                        <a href="index.php" class="btn btn-primary mt-2">Voltar</a>
                    </div>
                </div>
            </div>';
    
}

$query->close();

include("footer.php");

?>


