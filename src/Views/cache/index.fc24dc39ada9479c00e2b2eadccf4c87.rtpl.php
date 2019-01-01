<?php if(!class_exists('Rain\Tpl')){exit;}?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuários</span>
              <span class="info-box-number"><?php echo htmlspecialchars( $admin["user"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="ion ion-ios-gear-outline"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Produtos</span>
                <span class="info-box-number"><?php echo htmlspecialchars( $admin["product"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Vendas</span>
                  <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
      
                  <div class="info-box-content">
                    <span class="info-box-text">Lucro bruto</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>
      </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

