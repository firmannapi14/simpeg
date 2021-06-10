<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
    $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items WHERE id_logbook='$_GET[id]'");
    $count = mysqli_num_rows($q);
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
            <?php if (!empty($data['tgl_selesai_pengisian'])) { ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Info!</strong> Isi logbook sudah tidak dapat diubah karena proses pengisian telah selesai <i class="fa fa-check-circle"></i>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    </div> 
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?>
                            <a href="?page=logbook" class="btn btn-primary btn-sm float-right ml-1"><i class="fa fa-chevron-left"></i> kembali</a>
                            <?php if (empty($data['tgl_selesai_pengisian']) && $count > 0) { ?>
                                <a href="?page=logbookisifinish&id=<?= $_GET['id'] ?>" class="btn btn-success btn-sm float-right"><i class="fa fa-check-circle"></i> selesaikan pengisian</a>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                        <a href="?page=logbookisiadd&id=<?= $_GET['id'] ?>" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Logbook</a>
                                    <?php } ?>
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
                                                <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                                    <th>Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items
                                                                WHERE id_logbook='$_GET[id]'
                                                                ORDER BY tanggal ASC, mulai ASC");
                                        while($datas=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($datas['tanggal']) ? date_ind($datas['tanggal']) : '-' ?></td>
                                                <td><?= !empty($datas['mulai']) || !empty($datas['selesai']) ? date('H:i', strtotime($datas['mulai'])).' - '.date('H:i', strtotime($datas['selesai'])) : '-' ?></td>
                                                <td><?= !empty($datas['uraian_kegiatan']) ? $datas['uraian_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($datas['hasil_kegiatan']) ? $datas['hasil_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($datas['dokumen']) ? '<a href="file/'.$datas['dokumen'].'" class="text-info" target="_blank">'.$datas['dokumen'].'</a>' : '-' ?></td>
                                                <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                                    <td>
                                                        <a href="?page=logbookisiedit&id=<?= $_GET['id'] ?>&idx=<?= $datas['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                        <a href="?page=logbookisidelete&id=<?= $_GET['id'] ?>&idx=<?= $datas['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
                                                    </td>
                                                <?php } ?> 
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