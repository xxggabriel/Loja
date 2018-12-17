<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Produtos
          </h1>
          <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/users">Produto</a></li>
            <li class="active"><a href="/admin/users/create">Cadastrar</a></li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Novo Usuário</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="/admin/product/sample/<?php echo htmlspecialchars( $product["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">Titulo</label>
                      <input type="text" class="form-control" id="name" name="title" value='<?php if( !empty($product["title"]) ){ ?><?php echo htmlspecialchars( $product["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'  placeholder="Digite o Titulo">
                    </div>
                    
                    <div class="form-group">
                      <label for="link">link</label>
                      <input type="text"  class="form-control" id="link" value='<?php if( !empty($product["link"]) ){ ?><?php echo htmlspecialchars( $product["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' name="link" placeholder="Link do produto">
                    </div>
                    <div class="form-group">
                      <label for="photo">Foto do produto</label>
                      <input type="file" class="form-control-file" id="photo"  name="photo" >
                    </div>
                    <img src='<?php if( !empty($product["photo"]) ){ ?> <?php echo htmlspecialchars( $product["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>' height="300px">
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea type="text" class="form-control"  rows="10" name="description"  placeholder="Digite a descrição do produto"><?php if( !empty($product["description"]) ){ ?><?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></textarea>
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                  </div>
                </form>
              </div>
              </div>
          </div>
        
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
