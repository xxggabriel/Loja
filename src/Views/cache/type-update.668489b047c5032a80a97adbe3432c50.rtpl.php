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
                  <h3 class="box-title">Editar Marca</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/type/<?php echo htmlspecialchars( $type["id_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                  <div class="box-body">
                    

                    <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="name" class="form-control" id="name" name="name_type" placeholder="Digite o nome do fornecedor" value="<?php echo htmlspecialchars( $type["name_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Descrição</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Digite o nome do fornecedor" value="<?php echo htmlspecialchars( $type["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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