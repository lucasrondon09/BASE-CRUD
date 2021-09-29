<?php 

include("header.php");
include("restrito.php");
include("conexao.php");

$id = $_GET['id'];

$query = $mysqli->prepare("select id, nome, login, senha, tipo from usuarios where id= '$id'");
$query->bind_result($id, $nome, $login, $senha, $tipo);
$query->execute();
$query->store_result();
$result = $query->num_rows;
$query->fetch();

if($result > 0){
    
    $exibeMsg = 0;
    $data  = [
                'id'    => $id,
                'nome'  => $nome,
                'login' => $login,
                'senha' => $senha,
                'tipo'  => $tipo
               ];
    
}else{
    
    $exibeMsg = 1;
    
}

$query->close();
$mysqli->close();


?>


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Editar</h1>
                <a href="home.php" class="btn btn-primary my-3">Voltar</a>
                <?php if($exibeMsg > 0): ?>
                <div class="alert alert-danger">Cadastro não localizado, tente novamente!</div>
                <?php else:?>
                <form action="editar-action.php" class="mt-3" method="post">
                    <input type="text" name="id" class="form-control" value="<?= $data['id']?>" hidden="hidden">
                    <div class="form-group">
                        <label for="LNome">Nome</label>
                        <input type="text" name="nome" class="form-control" value="<?= $data['nome']?>">
                    </div>
                    <div class="form-group">
                        <label for="LLogin">Login</label>
                        <input type="text" name="login" class="form-control" value="<?= $data['login']?>">
                    </div>
                    <div class="form-group">
                        <label for="LSenha">Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="LTipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="1" <?= $data['tipo'] == 1 ? 'selected':'';?>>Administrador</option>
                            <option value="2" <?= $data['tipo'] == 2 ? 'selected':'';?>>Usuário</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-info float-right" value="Salvar">
                </form>
                <?php endif;?>
                
            </div>
        </div>
    </div>
    

<?php include("footer.php")?>