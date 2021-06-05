<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=pegawai">Data Profile</a></li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id                 = $_POST['id'];
                                            $id_old             = $_POST['id_old'];
                                            $id_new             = $id_old != $id ? $id : $id_old;
                                            $id_auth            = $_POST['id_auth'];
                                            $password           = encrypt_decrypt('encrypt', $_POST['password']);
                                            $nama               = $_POST['nama'];
                                            $jabatan            = $_POST['jabatan'];
                    
                                            $insert = mysqli_query($conn, "UPDATE tbl_pimpinan SET
                                                                        nip               = '$id_new',
                                                                        nama_pimpinan     = NULLIF('$nama', ''),
                                                                        jabatan_pimpinan  = NULLIF('$jabatan', '')
                                                                        WHERE nip         = '$id_old'") or die (mysqli_error($conn));

                                            $insert2 = mysqli_query($conn, "UPDATE tbl_auth SET
                                                                        nip                   = '$id_new',
                                                                        password_current_auth = NULLIF('$password', '')
                                                                        WHERE id              = '$id_auth'") or die (mysqli_error($conn));
                                            
                                            if ($insert && $insert2) {
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil disimpan.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=profile'>";
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