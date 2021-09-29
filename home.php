<?php 

include("header.php");
include("restrito.php");
include("conexao.php");



$query = $mysqli->prepare("select id, nome, login, senha, tipo, deleted_at from usuarios");
$query->bind_result($id, $nome, $login, $senha, $tipo, $deleted_at);
$query->execute();

while($query->fetch()){
    
    $data[] =   [
                'id'        => $id,
                'nome'      => $nome,
                'login'     => $login,
                'senha'     => $senha,
                'tipo'      => $tipo,
                'deleted_at'=> $deleted_at
                ];
    
}

$query->close();
$mysqli->close();

?>


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>BASE CRUD</h1>
                <h3>Bem Vindo, <?= $_SESSION['nome']?> <a href="logout.php" class="btn btn-secondary float-right">Sair</a></h3>
                <?php if($_SESSION['tipo'] == 1):?>
                <a href="cadastrar.php" class="btn btn-primary mt-3">Cadastrar</a>
                <?php endif;?>
                <table class="table mt-3">
                    <tr>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Ativo</th>
                        <?php if($_SESSION['tipo'] == 1):?>
                        <th></th>
                        <?php endif;?>
                    </tr>
                    <?php foreach($data as $dataItem):?>
                    <tr>
                        <td><?= $dataItem['nome'];?></td>
                        <td><?= $dataItem['login'];?></td>
                        <td><?= $dataItem['deleted_at'] == '1' ? 'Não': 'Sim'; ?></td>
                        <?php if($_SESSION['tipo'] == 1):?>
                        <td>
                            <a href="excluir.php?id=<?= $dataItem['id'];?>" class="btn btn-danger float-right">Excluir</a>
                            <a href="editar.php?id=<?= $dataItem['id'];?>" class="btn btn-info float-right mx-2">Editar</a>
                        </td>
                        <?php endif;?>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
    

<?php include("footer.php");?>