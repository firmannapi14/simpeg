<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_pegawai
                            JOIN tbl_auth ON tbl_pegawai.id=tbl_auth.id_pegawai
                            WHERE tbl_pegawai.id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=profile">Data Profile</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Profile</div>
                        <form action="?page=profileeditpro" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">NIK</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" placeholder="NIK ..." name="id" autocomplete="OFF" value="<?= $data['nik'] ?>" required>
                                                    <input type="hidden" name="id_user" value="<?= $data['id_pegawai'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input id="password-field" class="form-control" type="password" placeholder="Password ..." name="password" autocomplete="OFF" value="<?= encrypt_decrypt('decrypt', $data['password_current_auth']) ?>" required>
                                            <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input class="form-control" type="text" placeholder="Nama ..." name="nama" autocomplete="OFF" value="<?= $data['nama_pegawai'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tempat Lahir</label>
                                            <input class="form-control" type="text" placeholder="Tempat Lahir ..." name="tempat_lahir" value="<?= $data['tempat_lahir_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tanggal Lahir</label>
                                            <input class="form-control" type="date" placeholder="Tanggal Lahir ..." name="tanggal_lahir" value="<?= $data['tanggal_lahir_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="L" <?= $data['jenis_kelamin_pegawai'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                                <option value="P" <?= $data['jenis_kelamin_pegawai'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Golongan Darah</label>
                                            <select class="form-control" name="golongan_darah">
                                                <option value="A" <?= $data['golongan_darah_pegawai'] == 'A' ? 'selected' : '' ?>>A</option>
                                                <option value="B" <?= $data['golongan_darah_pegawai'] == 'B' ? 'selected' : '' ?>>B</option>
                                                <option value="O" <?= $data['golongan_darah_pegawai'] == 'O' ? 'selected' : '' ?>>O</option>
                                                <option value="AB" <?= $data['golongan_darah_pegawai'] == 'AB' ? 'selected' : '' ?>>AB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat ..."><?= $data['alamat_pegawai'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Status Pernikahan</label>
                                            <select class="form-control" name="status_pernikahan">
                                                <option value="KAWIN" <?= $data['status_pernikahan_pegawai'] == 'KAWIN' ? 'selected' : '' ?>>KAWIN</option>
                                                <option value="BELUM KAWIN" <?= $data['status_pernikahan_pegawai'] == 'BELUM KAWIN' ? 'selected' : '' ?>>BELUM KAWIN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Agama</label>
                                            <select class="form-control" name="agama">
                                                <option value="ISLAM" <?= $data['agama_pegawai'] == 'ISLAM' ? 'selected' : '' ?>>ISLAM</option>
                                                <option value="KRISTEN" <?= $data['agama_pegawai'] == 'KRISTEN' ? 'selected' : '' ?>>KRISTEN</option>
                                                <option value="KATOLIK" <?= $data['agama_pegawai'] == 'KATOLIK' ? 'selected' : '' ?>>KATOLIK</option>
                                                <option value="HINDU" <?= $data['agama_pegawai'] == 'HINDU' ? 'selected' : '' ?>>HINDU</option>
                                                <option value="BUDHA" <?= $data['agama_pegawai'] == 'BUDHA' ? 'selected' : '' ?>>BUDHA</option>
                                                <option value="KONGHUCU" <?= $data['agama_pegawai'] == 'KONGHUCU' ? 'selected' : '' ?>>KONGHUCU</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Pekerjaan</label>
                                            <input class="form-control" type="text" placeholder="Pekerjaan ..." name="pekerjaan" value="<?= $data['pekerjaan_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Kewarganegaraan</label>
                                            <select class="form-control" name="kewarganegaraan">
                                                <option value="WNA" <?= $data['kewarganegaraan_pegawai'] == 'WNA' ? 'selected' : '' ?>>WNA</option>
                                                <option value="WNI" <?= $data['kewarganegaraan_pegawai'] == 'WNI' ? 'selected' : '' ?>>WNI</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Pendidikan</label>
                                            <select class="form-control" name="pendidikan">
                                                <option value="SD" <?= $data['pendidikan_pegawai'] == 'SD' ? 'selected' : '' ?>>SD</option>
                                                <option value="SMP" <?= $data['pendidikan_pegawai'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                                <option value="SMA" <?= $data['pendidikan_pegawai'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
                                                <option value="DIPLOMA" <?= $data['pendidikan_pegawai'] == 'DIPLOMA' ? 'selected' : '' ?>>DIPLOMA</option>
                                                <option value="SARJANA" <?= $data['pendidikan_pegawai'] == 'SARJANA' ? 'selected' : '' ?>>SARJANA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jurusan</label>
                                            <input class="form-control" type="text" placeholder="Jurusan ..." name="jurusan" value="<?= $data['jurusan_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jabatan</label>
                                            <input class="form-control" type="text" placeholder="Jabatan ..." name="jabatan" value="<?= $data['jabatan_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No Telepon</label>
                                            <input class="form-control" type="text" placeholder="No Telepon ..." name="no_tlp" value="<?= $data['no_telepon_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No NPWP</label>
                                            <input class="form-control" type="text" placeholder="No NPWP ..." name="no_npwp" value="<?= $data['no_npwp_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No BPJS</label>
                                            <input class="form-control" type="text" placeholder="No BPJS ..." name="no_bpjs" value="<?= $data['no_bpjs_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No Rekening</label>
                                            <input class="form-control" type="text" placeholder="No Rekening ..." name="no_rekening" value="<?= $data['no_rekening_pegawai'] ?>" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=profile" class="btn btn-secondary">Kembali</a>
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