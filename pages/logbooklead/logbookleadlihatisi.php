<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_pegawai 
                            JOIN tbl_logbook ON tbl_pegawai.id=tbl_logbook.id_pegawai
                            WHERE tbl_pegawai.id='$_GET[idx]' AND tbl_logbook.id='$_GET[id]'");
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
                        <a href="?page=logbooklihat&id=<?= $_GET['idx'] ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-chevron-left"></i> kembali</a>
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
                                                <td><?= empty($data['jenis_kelamin_pegawai']) ? '-' : $data['jenis_kelamin_pegawai'] === 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Jabatan</td>
                                                <td><?= !empty($data['jabatan_pegawai']) ? $data['jabatan_pegawai'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Logbook Bulan</td>
                                                <td><?= !empty($data['bulan']) ? month_ind($data['bulan']) : '-' ?></td>
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
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Pukul</th>
                                                <th>Uraian Kegiatan</th>
                                                <th>Hasil Kegiatan</th>
                                                <th>Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items
                                                                WHERE id_logbook='$_GET[id]'
                                                                ORDER BY tanggal ASC, mulai ASC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['tanggal']) ? date_ind($data['tanggal']) : '-' ?></td>
                                                <td><?= !empty($data['mulai']) || !empty($data['selesai']) ? date('H:i', strtotime($data['mulai'])).' - '.date('H:i', strtotime($data['selesai'])) : '-' ?></td>
                                                <td><?= !empty($data['uraian_kegiatan']) ? $data['uraian_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($data['hasil_kegiatan']) ? $data['hasil_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($data['dokumen']) ? '<a href="file/'.$data['dokumen'].'" class="text-info" target="_blank">'.$data['dokumen'].'</a>' : '-' ?></td>
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