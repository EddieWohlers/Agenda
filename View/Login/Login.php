    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="/Login/Verificar" method="POST" id="formlogin">
                                       <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input class="form-control" placeholder="Login" name="nome" type="text">
                                        </div>
                                       <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                       </div>
                                       
                            
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit"  onclick="$('#formlogin').submit();" class="btn btn-lg btn-success btn-block">Entrar</button>
                            
                        </form>
                    </div>
                    </div>
                    
                </div>
            </div>

    </div>
    