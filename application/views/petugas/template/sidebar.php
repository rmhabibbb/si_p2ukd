<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">

                    <!-- Sidenav Menu Heading (Core)-->
                    <div class="sidenav-menu-heading">Menu</div>
                    <!-- Sidenav Accordion (Dashboard)-->

                    <?php if ($index == 1) { ?>
                        <a class="nav-link active" href="<?= base_url('petugas') ?>">
                        <?php } else { ?>
                            <a class="nav-link" href="<?= base_url('petugas') ?>">
                            <?php } ?>
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Beranda
                            </a>


                            <?php if ($index == 2) { ?>
                                <a class="nav-link active" href="<?= base_url('petugas/laporan') ?>">
                                <?php } else { ?>
                                    <a class="nav-link" href="<?= base_url('petugas/laporan') ?>">
                                    <?php } ?>
                                    <div class="nav-link-icon"><i data-feather="book"></i></div>
                                    Laporan
                                    </a>

                                    <?php if ($index == 3) { ?>
                                        <a class="nav-link active" href="<?= base_url('petugas/profil') ?>">
                                        <?php } else { ?>
                                            <a class="nav-link" href="<?= base_url('petugas/profil') ?>">
                                            <?php } ?>
                                            <div class="nav-link-icon"><i data-feather="user"></i></div>
                                            Profil
                                            </a>



                                            <a class="nav-link" href="<?= base_url('keluar') ?>">

                                                <div class="nav-link-icon"><i data-feather="log-out"></i></div>
                                                Logout
                                            </a>


                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title"><?= $profil->nama_petugas ?></div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>