<?php 

include("header.php");
include("restrito.php");

?>


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Cadastrar</h1>
                <a href="home.php" class="btn btn-primary mt-3">Voltar</a>
                <form action="cadastrar-action.php" class="mt-3" method="post">
                    <div class="form-group">
                        <label for="LNome">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="LLogin">Login</label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="LSenha">Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="LTipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-info float-right" value="Cadastrar">
                </form>
            </div>
        </div>
    </div>
    

<?php include("footer.php")?>