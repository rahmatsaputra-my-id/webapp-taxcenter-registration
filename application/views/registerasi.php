 <br>
<div class="container-fluid register"> 
   <div class="container formregister">
     <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('failed')): ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('failed'); ?>
        </div>
      <?php endif; ?>  
      <?php if (validation_errors()):?>
         <ul class="alert alert-danger">
            <?= validation_errors('<li>', '</li>') ?>
          </ul>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <h2 style='font-weight: bold;'>PENDAFTARAN RELAWAN PAJAK</h2>
        </div>      
      </div>             
      <div class="row">       
            <?php echo form_open_multipart('register/insert'); ?>         
            <div class="col-md-6">
                 <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="form-group">                
                            <label>Nama Depan</label>
                            <input name="firstname" placeholder="nama depan" id="firstname" type="text" class="form-control"/>
                        </div>

                         <div class="form-group">                
                            <label>Nama Belakang</label>
                            <input name="lastname" placeholder="nama belakang" id="lastname" type="text" class="form-control"/>
                        </div>

                        <div class="form-group">                
                            <label>Nama Lengkap</label>
                            <input name="namalengkap" placeholder="nama lengkap" id="namalengkap" type="text" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>NPM</label>
                            <input name="npm" id="npm" placeholder="8 digit npm anda" type="text" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="alamat" placeholder="alamat lengkap" class="form-control"></textarea>
                            <small class="text-info">Cantumkan nama kecamatan, kelurahan, dan kota domisili anda</small>
                        </div>

                        <div class="form-group">
                        <label>Email</label>
                            <input name="email" id="email" placeholder="email" type="text" class="form-control"/>
                        </div>

                        <div class="form-group">
                        <label>Password</label>
                            <input name="password" id="password" placeholder="minimal 6 karakter" type="password" class="form-control"/>
                            <small class="text-info">Gunakan kombinasi simbol,angka,huruf</small>
                        </div>

                        <div class="form-group">
                            <label>Nomor telepon</label>
                            <input name="telepon" id="telepon" placeholder="08xxxxx" type="number" class="form-control"/>
                            <small class="text-info">nomor ponsel yang terhubung dengan akun whatsapp</small>
                        </div>

                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-body">

                      <div class="form-group">
                            <label>IPK</label>
                            <input name="ipk" id="ipk" placeholder="contoh: 3.5" type="number" step="any" min="0.0" max="1.0" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input name="semester" id="semester" placeholder="isi dengan angka" type="number" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Fakultas</label>
                            <input name="fakultas" id="fakultas" placeholder="nama fakultas" type="text" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Jurusan</label>
                            <input name="jurusan" type="text" id="jurusan" placeholder="nama jurusan" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <input name="kelas" id="kelas" placeholder="kelas anda" type="text" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Pernah Mengikuti Relawan Pajak</label>
                            <input name="status" id="status" placeholder="Ya atau Tidak" type="text" class="form-control"/>
                            <small class="text-info">Isi dengan Ya atau Tidak</small>
                        </div>

                        <div class="form-group">
                          <label>Upload Berkas</label>
                            <input type="file" name="berkas">
                            <small class="text-info">Sertifikat,hasil scan KRS, dan surat pernyataan disatukan dalam file .rar atau .zip.</small>
                            <small class="text-info">Contoh format file: [Nama Lengkap]_[Kelas].rar (max size 2 MB)</small>
                        </div>

                        <div class="form-group">
                            <input name="register_submit" type="submit" value="Daftar" class="btn btn-primary form-control"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
      </div> 
</div>