<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Fornecedors
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Fornecedor</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/provider/<?php echo htmlspecialchars( $provider["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                  <div class="box-body">
                    

                    <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="name" class="form-control" id="name" name="name_provider" placeholder="Digite o nome do fornecedor" value="<?php echo htmlspecialchars( $provider["name_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                    </div>
                   
                    <div class="form-group">
                      <label for="phone">Telefone</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone"  value="<?php echo htmlspecialchars( $provider["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                      <label for="cnpj">CNPJ</label>
                      <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o CNPJ" value="<?php echo htmlspecialchars( $provider["cnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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