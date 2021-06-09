<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?>
                            <a href="?page=logbook" class="btn btn-primary btn-sm float-right"><i class="fa fa-chevron-left"></i> kembali</a>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <a href="?page=logbookisiadd&id=<?= $_GET['id'] ?>" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Logbook</a>
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
                                                <th>Aksi</th>
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
                                                <td>
                                                    <a href="?page=logbookisiedit&id=<?= $_GET['id'] ?>&idx=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=logbookisidelete&id=<?= $_GET['id'] ?>&idx=<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
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