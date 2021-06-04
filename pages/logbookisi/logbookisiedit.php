<?php
    $q = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE nik='$_GET[nik]' AND id='$_GET[id]'");
    $dataq = mysqli_fetch_array($q);
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook_items
                            WHERE id='$_GET[idx]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbookisi&nik=<?= $_GET['nik'] ?>&id=<?= $_GET['id'] ?>">Logbook <?= month_ind($dataq['bulan']) ?> <?= $dataq['tahun'] ?></a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Logbook <?= month_ind($dataq['bulan']) ?> <?= $dataq['tahun'] ?></div>
                        <form action="?page=logbookisieditpro&nik=<?= $_GET['nik'] ?>&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tanggal <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Mulai <span class="text-danger">*</span></label>
                                            <input class="form-control" type="time" name="mulai" value="<?= $data['mulai'] ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Selesai <span class="text-danger">*</span></label>
                                            <input class="form-control" type="time" name="selesai" value="<?= $data['selesai'] ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Uraian Kegiatan <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="uraian_kegiatan" rows="3" placeholder="Alamat ..." required><?= $data['uraian_kegiatan'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Hasil Kegiatan (opsional)</label>
                                            <textarea class="form-control" name="hasil_kegiatan" rows="3" placeholder="Alamat ..."><?= $data['hasil_kegiatan'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Dokumen (opsional)</label>
                                            <input class="form-control" type="file" name="file" accept=".doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.pdf,.zip,.rar" />
                                            <input type="hidden" name="old_file" value="<?= $data['dokumen'] ?>" />
                                            <a href="file/<?= $data['dokumen'] ?>" target="_blank" class="text-info"><?= $data['dokumen'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=logbookisi&nik=<?= $_GET['nik'] ?>&id=<?= $_GET['id'] ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>