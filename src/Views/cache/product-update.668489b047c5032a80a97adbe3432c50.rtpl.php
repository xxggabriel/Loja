<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Produtos
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Produto</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/product/<?php echo htmlspecialchars( $product["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="provider">Fornecedor</label>
                      <input type="number" class="form-control" id="provider" name="id_provider" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $provider["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="form-group">
                      <label for="brand">Marca</label>
                      <input type="number" class="form-control" id="brand" name="id_brand" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $brand["id_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="form-group">
                      <label for="desperson">Tipo</label>
                      <input type="number" class="form-control" id="type" name="id_type" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $type["id_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="form-group">
                      <label for="desperson">Nome</label>
                      <input type="text" class="form-control" id="desperson" name="name_product" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $product["name_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                      <label for="value">Valor</label>
                      <input type="text" class="form-control" id="value" name="value" placeholder="Digite o login"  value="<?php echo htmlspecialchars( $product["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                      <label for="value_cost">Valor Custo</label>
                      <input type="tel" class="form-control" id="value_cost" name="value_cost" placeholder="Digite o telefone"  value="<?php echo htmlspecialchars( $product["value_cost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                      <label for="amount">Quantidade</label>
                      <input type="number" class="form-control" id="" name="amount" placeholder="Digite a quantidade de produtos" value="<?php echo htmlspecialchars( $product["amount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
