<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
    
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/resource/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php if( !empty($_SESSION['name']) ){ ?><?php echo htmlspecialchars( $_SESSION["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>Sem Nome<?php } ?></p>
              <!-- Status -->
              <a href="/resource/admin/#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
    
          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
            </div>
          </form>
          <!-- /.search form -->
    
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/admin"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a></li>
            <li ><a href="/admin/users"><i class="glyphicon glyphicon-user"></i> <span>Usuarios</span></a></li>
            <li ><a href="/admin/product"><i class="glyphicon glyphicon-tag"></i> <span>Produtos</span></a></li>
            <li><a href="/admin/provider"><i class="glyphicon glyphicon-random"></i> <span>Fornecedores</span></a></li>
            <li><a href="/admin/brand"><i class="glyphicon glyphicon-book"></i> <span>Marcas</span></a></li>
            <li><a href="/admin/type"><i class="glyphicon glyphicon-bookmark"></i> <span>Tipos de Produtos</span></a></li>
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    