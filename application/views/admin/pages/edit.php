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
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="<?php echo base_url(); ?>dist/img/LOGO_TC.png" class="img-circle" alt="User Image">
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
        <li><a href="#"><i class="fa fa-pencil-square-o"></i>Edit Data Relawan</a></li>
        <!-- <li class="active">Data relawan</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Ubah Data Peserta Relawan Pajak</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="container-fluid register"> 
              <div class="formregister">
                <div class="row">       
                  <?php foreach ($update->result() as $row): ?>
                    <div class="col-md-6">
                         <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="form-group">                                    
                                    <input name="id" value="<?php echo $row->id?>" id="npm" placeholder="8 digit npm anda" type="hidden" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>NPM</label>
                                    <input name="npm" value="<?php echo $row->npm?>" id="npm" placeholder="8 digit npm anda" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">                
                                  <label>Nama Lengkap</label>
                                  <input name="namalengkap" value="<?php echo $row->nama_lengkap?>" placeholder="nama lengkap" id="namalengkap" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input name="alamat" value="<?php echo $row->alamat?>" id="alamat" placeholder="alamat lengkap" class="form-control" style=""></input>
                                    <p class="text-info">Cantumkan nama kecamatan, kelurahan, dan kota domisili anda</p>
                                </div>

                                <div class="form-group">
                                <label>Email</label>
                                    <input name="email" value="<?php echo $row->email?>" id="email" placeholder="email" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Nomor telepon</label>
                                    <input name="telepon" value="<?php echo$row->telepon?>" id="telepon" placeholder="08xxxxx" type="text" class="form-control"/>
                                    <p class="text-info">nomor ponsel yang terhubung dengan akun whatsapp</p>
                                </div>

                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-body">

                              <div class="form-group">
                                    <label>IPK</label>
                                    <input name="ipk" value="<?php echo $row->ipk?>" id="ipk" placeholder="contoh: 3.5" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Semester</label>
                                    <input name="semester" value="<?php echo $row->semester?>" id="semester" placeholder="isi dengan angka" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <input name="fakultas" value="<?php echo $row->fakultas?>" id="fakultas" placeholder="nama fakultas" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input name="jurusan" value="<?php echo $row->jurusan?>" type="text" id="jurusan" placeholder="nama jurusan" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input name="kelas" value="<?php echo $row->kelas?>" id="kelas" placeholder="kelas anda" type="text" class="form-control"/>
                                </div>

                                <div class="form-group">
                                  <label>Sertifikat</label>
                                    <input type="file" name="file">
                                </div>

                                 <div class="form-group">
                                  <label>Surat Pernyataan</label>
                                    <input type="file" name="file">
                                </div>

                                <div class="form-group">
                                    <input name="update" type="submit" value="UPDATE" class="btn btn-primary form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endforeach; ?>
              </div> 
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

