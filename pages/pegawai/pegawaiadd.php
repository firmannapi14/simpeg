<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=pegawai">Pegawai</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Pegawai</div>
                        <form action="?page=pegawaiaddpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">NIK</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" placeholder="NIK ..." name="id" autocomplete="OFF" required>
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
                                                while($datas = mysqli_fetch_array($sql)){
                                                    echo '<option value="'.$datas['id'].'">'.$datas['nama_rules'].'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input id="password-field" class="form-control" type="password" placeholder="Password ..." name="password" autocomplete="OFF" required>
                                            <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input class="form-control" type="text" placeholder="Nama ..." name="nama" autocomplete="OFF" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tempat Lahir</label>
                                            <input class="form-control" type="text" placeholder="Tempat Lahir ..." name="tempat_lahir" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Tanggal Lahir</label>
                                            <input class="form-control" type="date" placeholder="Tanggal Lahir ..." name="tanggal_lahir" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Golongan Darah</label>
                                            <select class="form-control" name="golongan_darah">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                                <option value="AB">AB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Status Pernikahan</label>
                                            <select class="form-control" name="status_pernikahan">
                                                <option value="KAWIN">KAWIN</option>
                                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Agama</label>
                                            <select class="form-control" name="agama">
                                                <option value="ISLAM">ISLAM</option>
                                                <option value="KRISTEN">KRISTEN</option>
                                                <option value="KATOLIK">KATOLIK</option>
                                                <option value="HINDU">HINDU</option>
                                                <option value="BUDHA">BUDHA</option>
                                                <option value="KONGHUCU">KONGHUCU</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Pekerjaan</label>
                                            <input class="form-control" type="text" placeholder="Pekerjaan ..." name="pekerjaan" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Kewarganegaraan</label>
                                            <select class="form-control" name="kewarganegaraan">
                                                <option value="WNA">WNA</option>
                                                <option value="WNI">WNI</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Pendidikan</label>
                                            <select class="form-control" name="pendidikan">
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="DIPLOMA">DIPLOMA</option>
                                                <option value="SARJANA">SARJANA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jurusan</label>
                                            <input class="form-control" type="text" placeholder="Jurusan ..." name="jurusan" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Jabatan</label>
                                            <input class="form-control" type="text" placeholder="Jabatan ..." name="jabatan" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No Telepon</label>
                                            <input class="form-control" type="text" placeholder="No Telepon ..." name="no_tlp" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No NPWP</label>
                                            <input class="form-control" type="text" placeholder="No NPWP ..." name="no_npwp" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No BPJS</label>
                                            <input class="form-control" type="text" placeholder="No BPJS ..." name="no_bpjs" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">No Rekening</label>
                                            <input class="form-control" type="text" placeholder="No Rekening ..." name="no_rekening" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=pegawai" class="btn btn-secondary">Kembali</a>
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