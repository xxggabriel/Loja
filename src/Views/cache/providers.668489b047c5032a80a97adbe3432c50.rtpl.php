<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Fornecedorse
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/providers">Fornecedorse</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
                
                <div class="box-header">
                  <a href="/admin/provider/create" class="btn btn-success">Cadastrar Fornecedor</a>
                  <div class="box-tools">
                    <form action="/admin/providers">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
    
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CNPJ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($provider) && ( is_array($provider) || $provider instanceof Traversable ) && sizeof($provider) ) foreach( $provider as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $value1["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["name_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["cnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <a href="/admin/provider/<?php echo htmlspecialchars( $value1["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                          <a href="/admin/provider/sample/<?php echo htmlspecialchars( $value1["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i>Amostra Do Produto </a>
                          <a href="/admin/provider/<?php echo htmlspecialchars( $value1["id_provider"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
                
          </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->