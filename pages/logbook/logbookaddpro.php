<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbook">Logbook</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Logbook</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $nik                = get_user_login('nik');
                                            $id                 = $uuid4->toString();
                                            $tahun              = $_POST['tahun'];
                                            $bulan              = $_POST['bulan'];

                                            $insert = mysqli_query($conn, "INSERT INTO tbl_logbook SET
                                                                        id     = '$id',
                                                                        nik    = '$nik',
                                                                        tahun  = '$tahun',
                                                                        bulan  = '$bulan'") or die (mysqli_error($conn));
                                            
                                            if ($insert) {
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil disimpan.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=logbook'>";
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