<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbookisi&id=<?= $_GET['id'] ?>">Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></div>
                        <form action="?page=logbookisiaddpro&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tanggal <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="tanggal" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Mulai <span class="text-danger">*</span></label>
                                            <input class="form-control" type="time" name="mulai" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Selesai <span class="text-danger">*</span></label>
                                            <input class="form-control" type="time" name="selesai" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Uraian Kegiatan <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="uraian_kegiatan" rows="3" placeholder="Uraian Kegiatan ..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Hasil Kegiatan (opsional)</label>
                                            <textarea class="form-control" name="hasil_kegiatan" rows="3" placeholder="Hasil kegiatan ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Dokumen (opsional)</label>
                                            <input class="form-control" type="file" name="file" accept=".doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.pdf,.zip,.rar" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=logbookisi&id=<?= $_GET['id'] ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>