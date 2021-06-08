<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_pegawai WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item"><a href="?page=logbook">Logbook</a></li>
        <li class="breadcrumb-item active">Data Logbook <?= $data['nik'] ?></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= $data['nik'] ?>
                        <a href="?page=logbook" class="btn btn-primary btn-sm float-right"><i class="fa fa-chevron-left"></i> kembali</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-responsive-sm table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">NIK</td>
                                                <td><?= !empty($data['nik']) ? $data['nik'] : '-'  ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Nama</td>
                                                <td><?= !empty($data['nama_pegawai']) ? $data['nama_pegawai'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Jenis Kelamin</td>
                                                <td><?= $data['jenis_kelamin_pegawai'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Jabatan</td>
                                                <td><?= !empty($data['jabatan_pegawai']) ? $data['jabatan_pegawai'] : '-' ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-xs table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Tahun</th>
                                                <th rowspan="2">Bulan</th>
                                                <th colspan="3">Tanggal</th>
                                                <th rowspan="2">Status</th>
                                                <th rowspan="2">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th>Selesai pengisian</th>
                                                <th>Permohonan</th>
                                                <th>Disetujui</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook 
                                                                WHERE id_pegawai='$_GET[id]'
                                                                ORDER BY bulan DESC, tahun DESC, updated_at DESC");

                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['tahun']) ? $data['tahun'] : '-' ?></td>
                                                <td><?= !empty($data['bulan']) ? month_ind($data['bulan']) : '-' ?></td>
                                                <td><?= !empty($data['tgl_selesai_pengisian']) ? date('d F Y H:i:s', strtotime($data['tgl_selesai_pengisian'])) : '-' ?></td>
                                                <td><?= !empty($data['tgl_permohonan']) ? date('d F Y H:i:s', strtotime($data['tgl_permohonan'])) : '-' ?></td>
                                                <td><?= !empty($data['tgl_disetujui']) ? date('d F Y H:i:s', strtotime($data['tgl_disetujui'])) : '-' ?></td>
                                                <td><?= !empty($data['status']) ? $data['status'] : '-' ?></td>
                                                <td>
                                                    <a href="?page=logbooklihatisi&id=<?= $data['id'] ?>&idx=<?= $data['id_pegawai'] ?>" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> buka</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>