<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Fornecedores
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
                  <h3 class="box-title">Novo Fornecedor</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/provider/create" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="text" class="form-control" id="name_provider" name="name_provider" placeholder="Digite o nome">
                    </div>
                      <div class="form-group">
                      <label for="phone">Telefone</label>
                      <input type="phone" class="form-control" id="phone" name="phone" placeholder="Digite o telefone">
                    </div>
                    <div class="form-group">
                      <label for="cnpj">CNPJ</label>
                      <input type="cnpj" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o telefone">
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