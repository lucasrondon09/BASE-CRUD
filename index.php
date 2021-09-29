<?php include("header.php")?>


    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-6 bg-light py-5 px-5 shadow roundedr">
                <h1 class="text-center text-muted">BASE CRUD</h1>
                <h3 class="text-center mt-3 text-primary">LOGIN</h3>
                <form action="validar.php" method="post">
                    <div class="form-group">
                        <label for="LLogin">Login</label>
                        <input type="text" class="form-control" name="login" id="login"> 
                    </div>
                    <div class="form-group">
                        <label for="LSenha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha"> 
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Acessar">
                </form>
            </div>
        </div>
    </div>
    

<?php include("footer.php")?>