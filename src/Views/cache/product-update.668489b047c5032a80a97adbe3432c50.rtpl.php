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
                      <select class="form-control" name="id_provider" id="provider">

                          <?php if( empty($product["id_provider"]) ){ ?>
                          <option value="NULL">Sem marca</option>
                          <?php }else{ ?>
                          <option value="<?php echo htmlspecialchars( $product["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php $k = $product["id_provider"] - 1; ?><?php echo htmlspecialchars( $provider["$k"]["name_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                          <?php } ?>
                        <?php $counter1=-1;  if( isset($provider) && ( is_array($provider) || $provider instanceof Traversable ) && sizeof($provider) ) foreach( $provider as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>                    
                        <?php } ?>
                     
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="brand">Marca</label>
                      <select class="form-control" name="id_brand" id="brand">
                        <?php if( empty($product["id_brand"]) ){ ?>
                        <option value="NULL">Sem marca</option>
                        <?php }else{ ?>
                        <option value="<?php echo htmlspecialchars( $product["id_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php $k = $product["id_brand"] - 1; ?><?php echo htmlspecialchars( $brand["$k"]["name_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                        <?php } ?>
                        <?php $counter1=-1;  if( isset($brand) && ( is_array($brand) || $brand instanceof Traversable ) && sizeof($brand) ) foreach( $brand as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>                    
                        <?php } ?>
                     
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="type">Tipo</label>
                      <select class="form-control" name="id_type" id="type">

                          <?php if( !empty($product["id_type"]) ){ ?>
                          <option value="<?php echo htmlspecialchars( $product["id_type"] , ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php $k = $product["id_type"] - 1; ?><?php echo htmlspecialchars( $type["$k"]["name_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </option>
                          <?php }else{ ?>
                          <option value="NULL">Sem tipo</option>
                          <?php } ?>
                        <?php $counter1=-1;  if( isset($type) && ( is_array($type) || $type instanceof Traversable ) && sizeof($type) ) foreach( $type as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>                    
                        <?php } ?>
                     
                      </select>
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
