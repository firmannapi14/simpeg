<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbook">Logbook</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Logbook</div>
                        <form action="?page=logbookeditpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tahun <span class="text-danger">*</span></label>
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                            <select class="form-control" name="tahun" required>
                                            <option value="" style="display: none;">-- Pilih Tahun --</option>
                                            <?php 
                                                for ($i=1990; $i<=(int)date('Y'); $i++ ) { ?>
                                                    <option value="<?= $i ?>" <?= $i == $data['tahun'] ? 'selected' : '' ?>><?= $i ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Bulan <span class="text-danger">*</span></label>
                                            <select class="form-control" name="bulan" required>
                                                <option value="" style="display: none;">-- Pilih Bulan --</option>
                                                <option value="01" <?= $data['bulan'] == '01' ? 'selected' : '' ?>>Januari</option>
                                                <option value="02" <?= $data['bulan'] == '02' ? 'selected' : '' ?>>Febuari</option>
                                                <option value="03" <?= $data['bulan'] == '03' ? 'selected' : '' ?>>Maret</option>
                                                <option value="04" <?= $data['bulan'] == '04' ? 'selected' : '' ?>>April</option>
                                                <option value="05" <?= $data['bulan'] == '05' ? 'selected' : '' ?>>Mei</option>
                                                <option value="06" <?= $data['bulan'] == '06' ? 'selected' : '' ?>>Juni</option>
                                                <option value="07" <?= $data['bulan'] == '07' ? 'selected' : '' ?>>Juli</option>
                                                <option value="08" <?= $data['bulan'] == '08' ? 'selected' : '' ?>>Agustus</option>
                                                <option value="09" <?= $data['bulan'] == '09' ? 'selected' : '' ?>>September</option>
                                                <option value="10" <?= $data['bulan'] == '10' ? 'selected' : '' ?>>Oktober</option>
                                                <option value="11" <?= $data['bulan'] == '11' ? 'selected' : '' ?>>November</option>
                                                <option value="12" <?= $data['bulan'] == '12' ? 'selected' : '' ?>>Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=logbook" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>