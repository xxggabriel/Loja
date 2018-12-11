<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar Senha do Usuário
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Senha do Usuário</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
        

        
                <form role="form" action="/admin/users/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/password" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="password">Nova Senha</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Nova senha">
                    </div>
                    <div class="form-group">
                      <label for="password-confirm">Confirme a senha</label>
                      <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Confirme a nova senha">
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </form>
              </div>
              </div>
          </div>
        
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->