<header class="page-header page-header-dark bg-success pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="book"></i></div>
                        Data Laporan - <?= $this->Laporan_m->get_namabulan($laporan->bulan) ?> <?= $laporan->tahun ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-xl px-4 mt-n10">
    <div class="card mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('msg') ?>

            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                <tbody>

                    <tr>
                        <th style="width: 30%">
                            ID Laporan
                        </th>
                        <td>

                            <?= $laporan->id_laporan ?>

                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%">
                            Bulan/Tahun
                        </th>
                        <td>

                            <?= $this->Laporan_m->get_namabulan($laporan->bulan) ?> <?= $laporan->tahun ?>

                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30%">
                            Jumlah Kegiatan
                        </th>
                        <td>
                            <?= $this->Kegiatan_m->get_num_row(['id_laporan' => $laporan->id_laporan]) ?>
                        </td>
                    </tr>


                </tbody>

            </table>
            <br>
            <center>
                <button type="button" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-success">Edit Laporan</button>

                <button type="button" data-bs-toggle="modal" data-bs-target="#hapus" class="btn btn-danger">Hapus Laporan</button>

            </center>
        </div>
    </div>

</div>

<div class="container-xl px-4">
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Kegiatan</h3>
            </div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahkegiatan" class="btn btn-success">Tambah Kegiatan</button>

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Hari, Tanggal</th>
                        <th>Uraian Kegiatan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_kegiatan as $row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $tdis->Kegiatan_m->get_tgl($row->tanggal_kegiatan) ?></td>
                            <td><?= $row->nama_kegiatan ?></td>
                            <td><?= $row->keterangan ?></td>
                            <td>

                                <a type="button" data-bs-toggle="modal" data-bs-target="#edit-<?= $row->id_kegiatan ?>" href="">
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="edit"></i></button>
                                </a>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#delete-<?= $row->id_kegiatan ?>" href="">

                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Laporan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('petugas/laporan') ?>" method="Post">
                    <table class="table table-bordered">
                        <input type="hidden" name="id_laporan" value="<?= $laporan->id_laporan ?>">

                        <tr>
                            <th>Bulan</th>
                            <th>
                                <select class="form-control" name="bulan" required>
                                    <option value="<?= $laporan->bulan ?>"><?= $this->Laporan_m->get_namabulan($laporan->bulan) ?></option>

                                    <?php
                                    $bln = $this->Laporan_m->array_bulan();
                                    ?>
                                    <?php foreach ($bln as $row) : ?>
                                        <?php if ($row['id'] != $laporan->bulan) { ?>

                                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>

                                        <?php  } ?>
                                    <?php endforeach; ?>
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th>Tahun</th>
                            <th>
                                <input type="number" class="form-control" name="tahun" value="<?= $laporan->tahun ?>" required autofocus>
                            </th>
                        </tr>


                    </table>
                    <div class="modal-footer">
                        <input type="submit" class="btn bg-success text-white" name="edit" value="Simpan">
                    </div>

                    <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Laporan?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('petugas/laporan') ?>" method="Post">
                <input type="hidden" value="<?= $laporan->id_laporan ?>" name="id_laporan">
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Laporan</th>
                            <th>
                                <?= $laporan->id_laporan ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Bulan/Tahun</th>
                            <th>
                                <?= $this->Laporan_m->get_namabulan($laporan->bulan) ?> <?= $laporan->tahun ?>
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-block text-white " name="hapus" value="Hapus">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahkegiatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('petugas/kegiatan') ?>" method="Post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_laporan" required autofocus value="<?= $laporan->id_laporan ?>">

                    <table class="table table-bordered table-striped table-hover" style="max-height: 300px">
                        <tbody>
                            <tr>
                                <th style="width: 30%">
                                    Tanggal Kegiatan
                                </th>
                                <td>
                                    <input type="date" class="form-control" name="tanggal_kegiatan" placeholder="Tanggal" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">
                                    Nama Kegiatan
                                </th>
                                <td>
                                    <textarea class="form-control" name="nama_kegiatan" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">
                                    Keterangan
                                </th>
                                <td>
                                    <textarea class="form-control" name="keterangan" required></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-block text-white " name="tambah" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>