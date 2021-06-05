<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_pimpinan
                            JOIN tbl_rules ON tbl_pimpinan.id_rules=tbl_rules.id
                            JOIN tbl_auth ON tbl_pimpinan.nip=tbl_auth.nip
                            WHERE tbl_pimpinan.nip='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=pimpinan">Pimpinan</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Pimpinan</div>
                        <form action="?page=pimpinaneditpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">NIP</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" placeholder="NIP ..." name="id" autocomplete="OFF" value="<?= $data['nip'] ?>" required>
                                                    <input type="hidden" name="id_old" autocomplete="OFF" value="<?= $data['nip'] ?>" required>
                                                    <input type="hidden" name="id_auth" value="<?= $data['id'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Rules</label>
                                            <select class="form-control" name="rules">
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT * FROM tbl_rules");
                                                while($datas = mysqli_fetch_array($sql)){ ?>
                                                    <option value="<?= $datas['id'] ?>" <?= $datas['id'] == $data['id_rules'] ? 'selected' : '' ?>><?= $datas['nama_rules'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input id="password-field" class="form-control" type="password" placeholder="Password ..." name="password" value="<?= encrypt_decrypt('decrypt', $data['password_current_auth']) ?>" autocomplete="OFF" required>
                                            <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input class="form-control" type="text" placeholder="Nama ..." name="nama" autocomplete="OFF" value="<?= $data['nama_pimpinan'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jabatan</label>
                                            <textarea class="form-control" name="jabatan" rows="3" placeholder="Jabatan ..."><?= $data['jabatan_pimpinan'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=pimpinan" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>