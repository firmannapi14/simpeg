<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=customer">Pegawai</a></li>
        <li class="breadcrumb-item active">Tambah Data Pegawai</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Pegawai</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id                 = $_POST['id'];
                                            $id_auth            = $uuid4->toString();
                                            $rules              = $_POST['rules'];
                                            $password           = encrypt_decrypt('encrypt', $_POST['password']);
                                            $nama               = $_POST['nama'];
                                            $tempat_lahir       = $_POST['tempat_lahir'];
                                            $tanggal_lahir      = $_POST['tanggal_lahir'];
                                            $jenis_kelamin      = $_POST['jenis_kelamin'];
                                            $golongan_darah     = $_POST['golongan_darah'];
                                            $alamat             = $_POST['alamat'];
                                            $status_pernikahan  = $_POST['status_pernikahan'];
                                            $agama              = $_POST['agama'];
                                            $pekerjaan          = $_POST['pekerjaan'];
                                            $kewarganegaraan    = $_POST['kewarganegaraan'];
                                            $pendidikan         = $_POST['pendidikan'];
                                            $jurusan            = $_POST['jurusan'];
                                            $jabatan            = $_POST['jabatan'];
                                            $no_tlp             = $_POST['no_tlp'];
                                            $no_npwp            = $_POST['no_npwp'];
                                            $no_bpjs            = $_POST['no_bpjs'];
                                            $no_rekening        = $_POST['no_rekening'];
                    
                                            $insert = mysqli_query($conn, "INSERT INTO tbl_pegawai SET
                                                                        nik                       = '$id',
                                                                        id_rules                  = $rules,
                                                                        nama_pegawai              = NULLIF('$nama', ''),
                                                                        tempat_lahir_pegawai      = NULLIF('$tempat_lahir', ''),
                                                                        tanggal_lahir_pegawai     = NULLIF('$tanggal_lahir', ''),
                                                                        jenis_kelamin_pegawai     = NULLIF('$jenis_kelamin', ''),
                                                                        golongan_darah_pegawai    = NULLIF('$golongan_darah', ''),
                                                                        alamat_pegawai            = NULLIF('$alamat', ''),
                                                                        status_pernikahan_pegawai = NULLIF('$status_pernikahan', ''),
                                                                        agama_pegawai             = NULLIF('$agama', ''),
                                                                        pekerjaan_pegawai         = NULLIF('$pekerjaan', ''),
                                                                        kewarganegaraan_pegawai   = NULLIF('$kewarganegaraan', ''),
                                                                        pendidikan_pegawai        = NULLIF('$pendidikan', ''),
                                                                        jurusan_pegawai           = NULLIF('$jurusan', ''),
                                                                        jabatan_pegawai           = NULLIF('$jabatan', ''),
                                                                        no_telepon_pegawai        = NULLIF('$no_tlp', ''),
                                                                        no_npwp_pegawai           = NULLIF('$no_npwp', ''),
                                                                        no_bpjs_pegawai           = NULLIF('$no_bpjs', ''),
                                                                        no_rekening_pegawai       = NULLIF('$no_rekening', '')") or die (mysqli_error($conn));

                                            $insert2 = mysqli_query($conn, "INSERT INTO tbl_auth SET
                                                                        id                    = '$id_auth',
                                                                        nik                   = '$id',
                                                                        password_current_auth = NULLIF('$password', '')") or die (mysqli_error($conn));
                                            
                                            if ($insert && $insert2) {
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil disimpan.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=pegawai'>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>