<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lista de Tipos
          </h1>
          <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/types">Tipos</a></li>
            <li class="active"><a href="/admin/type/create">Cadastrar</a></li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
        
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Novo Marca</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/admin/type/create" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name_type">Nome</label>
                      <input type="text" class="form-control" id="name_type" name="name_type" placeholder="Digite o nome">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Digite o nome"></textarea>
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