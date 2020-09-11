<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Relawan</b>Pajak</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url(); ?>dist/img/Logo_TC.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Relawan Pajak</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>dist/img/Logo_TC.png" class="img-circle" alt="User Image">
                <p>
                  Administrator - Relawan Pajak
                  <small>Tax Center Gunadarma</small>
                  <small>Universitas Gunadarma</small>
                </p>
              </li>            
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a onclick="return confirm('Keluar halaman Administrator?')" href="<?php echo site_url('user/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>dist/img/Logo_TC.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Relawan Pajak</p>
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <!-- <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div> -->
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa fa-home"></i> <span>Data Relawan</span></a></li>
        <li class="treeview">          
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Relawan Pajak
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Data Relawan</a></li>
        <!-- <li class="active">Data relawan</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Data Peserta Relawan Pajak</b></h3>
              <div>
                <a href="<?php echo base_url(); ?>admin/dashboard/exportcsv"><button type="submit" name="export" class="btn btn-info btn-xs fa fa-download" value="Export to CSV"> .CSV</button></a>
                <a href="<?php echo base_url(); ?>admin/dashboard/exportexcel"><button type="submit" name="export" class="btn btn-success btn-xs fa fa-download" value="Export to CSV"> .XLS</button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                  <?php echo $this->session->flashdata('success'); ?>
              </div>
              <?php endif; ?> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">NO</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">NPM</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">NAMA</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">ALAMAT</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">FAKULTAS</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">JURUSAN</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">KELAS</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">SEMESTER</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">IPK</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">EMAIL</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">NO.HP</th>      
                  <th class="text-center" rowspan="2" style="padding-bottom: 10px">PERNAH IKUT RELAWAN PAJAK</th>
                  <th class="text-center" rowspan="2" style="padding-bottom: 40px">BERKAS</th>
                  <th class="text-center" colspan="2" style="padding-bottom: 10px">ACTION</th>
                </tr>
                <tr>                  
                  <!-- <td class="text-center" style="font-weight: bold; padding-top: 15px">UPDATE</td> -->
                  <th class="text-center" rowspan="2" style="padding-bottom: 20px">UNDUH BERKAS</th>
                  <td class="text-center" style="font-weight: bold; padding-top: 15px">DELETE</td>
                </tr>

                </thead>
                <tbody>
                <?php $i = 1; foreach ($list as $result) { ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $result->npm ?></td>
                  <td><?php echo $result->nama_lengkap ?></td>                  
                  <td><?php echo $result->alamat ?></td>
                  <td><?php echo $result->fakultas ?></td>
                  <td><?php echo $result->jurusan ?></td>
                  <td><?php echo $result->kelas ?></td>
                  <td class="text-center"><?php echo $result->semester ?></td>
                  <td><?php echo $result->ipk ?></td>
                  <td><?php echo $result->email ?></td>
                  <td><?php echo $result->telepon ?></td>
                  <td class="text-center"><?php echo $result->status ?></td>
                  <td><?php echo $result->file ?></td>
                  <td class="text-center"><a href="<?php echo base_url().'admin/dashboard/download/'.$result->id; ?>" class="btn btn-primary btn-sm fa fa-file"></a></td>
                  <!-- <td class="text-center"><a href="<?php echo base_url('admin/dashboard/show_update_data/'.$result->id) ?>" title="" class="btn btn-success btn-sm fa fa-pencil-square-o"></a></td> -->
                  <td class="text-center" ><a onclick="return confirm('Apakah anda yakin?')" href="<?php echo site_url('admin/dashboard/delete/'.$result->id) ?>" title="" class="btn btn-danger btn-sm fa fa-trash-o"></a></td>
                </tr>
                <?php $i++; } ?>
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

