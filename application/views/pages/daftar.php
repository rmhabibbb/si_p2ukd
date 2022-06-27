<section class="bg-white py-15">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 style="font-size: 40px">Daftar Akun</h1>
        </div>
        <form action="<?= base_url('daftar/') ?>" method="POST" data-aos="fade-up" id="formadd">

            <?php if (isset($_GET['kode'])) { ?>
                <input name="kode" type="hidden" value="<?= $_GET['kode'] ?>">
            <?php } ?>


            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-4">
                    <?= $this->session->flashdata('msg') ?>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input class="form-control" type="email" id="email" name="email" required value="<?php
                                                                                                                if (isset($_COOKIE['email_temp'])) {
                                                                                                                    echo $_COOKIE['email_temp'];
                                                                                                                }
                                                                                                                ?>" <?php if (empty($_COOKIE['email_temp'])) {
                                                                                                                        echo 'autofocus';
                                                                                                                    } ?> pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$">

                        </div>



                        <div class="help-info" id="pesan4_pgw"></div>
                    </div>

                    <div class="form-group">
                        <label>NIP</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="nip" name="nip" required value="<?php
                                                                                                        if (isset($_COOKIE['nip_temp'])) {
                                                                                                            echo $_COOKIE['nip_temp'];
                                                                                                        }
                                                                                                        ?>" <?php if (empty($_COOKIE['nip_temp'])) {
                                                                                                                echo 'autofocus';
                                                                                                            } ?>>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="nama" required value="<?php if (isset($_COOKIE['nama_temp'])) {
                                                                                                    echo $_COOKIE['nama_temp'];
                                                                                                }  ?>" <?php if (empty($_COOKIE['nama_temp'])) {
                                                                                                            echo 'autofocus';
                                                                                                        } ?>>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" type="password" id="pass1_pgw" name="password" required>
                            <div class="input-group-addon">
                                <a onclick="show()" class="form-control" id="icon"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="help-info" id="pesan2_pgw"></div>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <div class="input-group" id="show_hide_password2">
                            <input class="form-control" type="password" id="pass2_pgw" name="password2" required>
                            <div class="input-group-addon">
                                <a onclick="show2()" class="form-control" id="icon2"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="help-info" id="pesan3_pgw"></div>
                    </div>

                    <center>
                        <input type="submit" name="daftar" class="btn btn-block btn-primary btn-marketing rounded-pill lift lift-sm my-3" value="Daftar">
                    </center>

                    <hr>
                    <p>Sudah punya akun ? <a href="<?= base_url('masuk') ?>">Masuk </a></p>
                </div>
            </div>
        </form>
    </div>
</section>



<script type="text/javascript">
    function show() {
        var x = document.getElementById("pass1_pgw");
        if (x.type === "password") {
            x.type = "text";

            $('#icon').html('<i class="fa fa-eye" aria-hidden="true"></i>');
        } else {
            x.type = "password";
            $('#icon').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
        }
    }

    function show2() {
        var x = document.getElementById("pass2_pgw");
        if (x.type === "password") {
            x.type = "text";

            $('#icon2').html('<i class="fa fa-eye" aria-hidden="true"></i>');
        } else {
            x.type = "password";
            $('#icon2').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
        }
    }
</script>