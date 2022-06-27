<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
  <div class="container-xl px-4">
    <div class="page-header-content pt-4">
      <div class="row align-items-center justify-content-between">
        <div class="col-auto mt-4">
          <h1 class="page-header-title">
            <div class="page-header-icon"><i data-feather="user"></i></div>
            Profil
          </h1>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main content -->
<div class="container-xl px-4 mt-n10">
  <div class="container-fluid">
    <div class="row">
      <?= $this->session->flashdata('msg') ?>
      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
          <div class="card-body">
            <?php echo form_open_multipart('petugas/proses_edit_profil'); ?>
            <input type="hidden" name="email_x" value="<?= $profil->email ?>" />
            <input type="hidden" name="nip_x" value="<?= $profil->nip ?>" />
            <!-- Form Group (username)-->

            <div class="mb-3">
              <label class="small mb-1" for="inputNIP">NIP</label>
              <input type="text" id="inputNIP" name="nip" class="form-control" placeholder="NIP" value="<?= $profil->nip ?>" required />
            </div>

            <div class="mb-3">
              <label class="small mb-1" for="inputnama_petugas">Nama Lengkap</label>
              <input type="text" id="inputnama_petugas" name="nama_petugas" class="form-control" placeholder="Nama Lengkap" value="<?= $profil->nama_petugas ?>" required />
            </div>

            <div class="mb-3">
              <label class="small mb-1" for="inputEmail">Email</label>
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" value="<?= $profil->email ?>" required />
            </div>




            <!-- Form Row-->
            <div class="row gx-3 mb-3">
              <!-- Form Group (phone number)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputBirthday">Tempat, Tanggal Lahir</label>
                <input class="form-control" id="inputPhone" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $profil->tempat_lahir ?>" required />
              </div>

              <div class="col-md-6">
                <label class="small mb-1" for="inputBirthday"></label>
                <input class="form-control" id="inputBirthday" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $profil->tanggal_lahir ?>" required />

              </div>
              <!-- Form Group (birthday)-->

            </div>

            <div class="mb-3">
              <label class="small mb-1" for="inputwilaya">Wilyah Tugas</label>
              <input type="text" id="inputwilaya" name="wilayah_tugas" class="form-control" placeholder="Wilyah Tugas" value="<?= $profil->wilayah_tugas ?>" required />
            </div>

            <div class="mb-3">
              <label class="small mb-1" for="inputalamat">Alamat</label>
              <textarea name="alamat" class="form-control" id="inputalamat" placeholder="Alamat" required><?= $profil->alamat ?></textarea>
            </div>

            <div class="row gx-3 mb-3">
              <!-- Form Group (phone number)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputrt">RT</label>
                <input class="form-control" id="inputrt" type="text" name="rt" placeholder="RT" value="<?= $profil->rt ?>" required />
              </div>

              <div class="col-md-6">
                <label class="small mb-1" for="inputrw">RW</label>
                <input class="form-control" id="inputrw" type="text" name="rw" placeholder="RW" value="<?= $profil->rw ?>" required />
              </div>
              <!-- Form Group (birthday)-->

            </div>
            <div class="row gx-3 mb-3">
              <!-- Form Group (phone number)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputkecamatan">Kecamatan</label>
                <input class="form-control" id="inputkecamatan" type="text" name="kecamatan" placeholder="Kecamatan" value="<?= $profil->kecamatan ?>" required />
              </div>

              <div class="col-md-6">
                <label class="small mb-1" for="inputkelurahan">Kelurahan/Desa</label>
                <input class="form-control" id="inputkelurahan" type="text" name="kelurahan" placeholder="Kelurahan" value="<?= $profil->kelurahan ?>" required />
              </div>
              <!-- Form Group (birthday)-->

            </div>

            <div class="mb-3">
              <label class="small mb-1" for="inputkabupaten">Kabupaten/Kota</label>
              <input type="text" id="inputkabupaten" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota" value="<?= $profil->kabupaten ?>" required />
            </div>


            <!-- Save changes button-->
            <center>
              <input type="submit" class="btn btn-primary" value="Simpan" name="edit">
            </center>
            </form>
          </div>
        </div>
      </div>

      <div class="col-xl-4">

        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Password</div>
          <div class="card-body text-center">

            <button type="button" data-bs-toggle="modal" data-bs-target="#ganti" class="btn btn-primary">Ganti Password</button>


          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<div class="modal fade" id="ganti" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ganti Password</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('petugas/proses_edit_profil') ?>" method="Post" id="editform2">

          <div class="help-info" id="pesan4_ks"> </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="pass" id="passlama" placeholder="Password Lama" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="help-info" id="pesan2_ks"></div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="pass1" id="pass1_ks" placeholder="Password baru" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="help-info" id="pesan3_ks"> </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="pass2" id="pass2_ks" placeholder="Konfirmasi Password Baru" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>



      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="edit2" value="Simpan">

        <?php echo form_close() ?>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>