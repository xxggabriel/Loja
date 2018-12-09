<?php if(!class_exists('Rain\Tpl')){exit;}?><section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Faça login na sua conta</h2>
                    <form action="/login" method="POST">
                        <input type="text" placeholder="Login" name="login"/>
                        <input type="password" placeholder="Sua senha" name="password"/>
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Lembrar dados
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Ou</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Faça seu cadastro!</h2>
                    <form action="/register" method="POST">
                        <input type="text" placeholder="Login" name="login_create"/>
                        <input type="email" placeholder="Email Address" name="email_create"/>
                        <input type="password" placeholder="Password" name="password_create"/>
                        <button type="submit" class="btn btn-default">Cadastrar</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->