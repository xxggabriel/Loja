<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
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
                <form role="form" action="/admin/product/create" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="text" class="form-control" id="name" name="name_product" placeholder="Digite o nome">
                    </div>
                    <div class="form-group">
                      <label for="id_provider">Fornecedor</label>
                      <input type="number" class="form-control" id="id_provider" name="id_provider" placeholder="Fornecedor">
                    </div>
                    <div class="form-group">
                      <label for="id_brand">Marca</label>
                      <input type="number" class="form-control" id="id_brand" name="id_brand" placeholder="Digite o telefone">
                    </div>
                    <div class="form-group">
                      <label for="id_type">Tipo de Produto</label>
                      <input type="number" class="form-control" id="id_type" name="id_type" placeholder="Digite o e-mail">
                    </div>
                    <div class="form-group">
                      <label for="value">Valor</label>
                      <input type="number" step="0.01" class="form-control" id="value" name="value" placeholder="Digite a senha">
                    </div>
                    <div class="form-group">
                      <label for="value_cost">Valor Custo</label>
                      <input type="number" step="0.01" class="form-control" id="value_cost" name="value_cost" placeholder="Digite a senha">
                    </div>
                      <div class="form-group">
                      <label for="value">Quantidade</label>
                      <input type="number" pattern="[0-9]+[.]" min="0" step="any" class="form-control" id="value" name="amount" placeholder="Digite a senha">
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