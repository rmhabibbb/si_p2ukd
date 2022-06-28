<header class="page-header page-header-dark bg-primary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="book"></i></div>
                        Data Laporan
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('msg') ?>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">Buat Laporan Baru</button>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jumlah Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($list_laporan as $row) : ?>
                        <tr>
                            <td><?= $i++ ?> </td>
                            <td><?= $this->Laporan_m->get_namabulan($row->bulan) ?></td>
                            <td><?= $row->tahun ?></td>
                            <td>
                                <?= $this->Kegiatan_m->get_num_row(['id_laporan' => $row->id_laporan]) ?>
                            </td>

                            <td>

                                <a href="<?= base_url('petugas/laporan/' . $row->id_laporan) ?>">
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="edit"></i></button>
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Buat Laporan Baru</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('petugas/laporan') ?>" method="Post">

                    <table class="table table-bordered">
                        <tr>
                            <th>Bulan</th>
                            <th>
                                <select class="form-control" name="bulan" required>
                                    <option value="">Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th>Tahun</th>
                            <th>
                                <input type="number" class="form-control" name="tahun" value="<?= date('Y') ?>" required autofocus>
                            </th>
                        </tr>


                    </table>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn bg-success text-white" name="tambah" value="Tambah">
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>