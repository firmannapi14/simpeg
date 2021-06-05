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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id                 = $_POST['id'];
                                            $id_user            = $_POST['id_user'];
                                            $rules              = $_POST['rules'];
                                            $password           = encrypt_decrypt('encrypt', $_POST['password']);
                                            $nama               = $_POST['nama'];
                                            $jabatan            = $_POST['jabatan'];
                    
                                            $insert = mysqli_query($conn, "UPDATE tbl_pimpinan SET
                                                                        nip                   = '$id',
                                                                        id_rules              = $rules,
                                                                        nama_pimpinan         = NULLIF('$nama', ''),
                                                                        jabatan_pimpinan      = NULLIF('$jabatan', '')
                                                                        WHERE id              = '$id_user'") or die (mysqli_error($conn));

                                            $insert2 = mysqli_query($conn, "UPDATE tbl_auth SET
                                                                        password_current_auth = NULLIF('$password', '')
                                                                        WHERE id_pimpinan     = '$id_user'") or die (mysqli_error($conn));
                                            
                                            if ($insert && $insert2) {
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil disimpan.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=pimpinan'>";
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