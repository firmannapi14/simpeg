<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbook">Logbook</a></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        $id_logbook         = $_GET['id'];
                                        $id_pimpinan        = get_user_login('id_user');
                                        $dateNow            = date('Y-m-d H:i:s');

                                        $insert = mysqli_query($conn, "UPDATE tbl_logbook SET
                                                                    id_pimpinan     = '$id_pimpinan',
                                                                    tgl_disetujui   = '$dateNow',
                                                                    status          = 'D'
                                                                    WHERE id        = '$id_logbook'") or die (mysqli_error($conn));
                                        
                                        if ($insert) {
                                            echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Acc logbook berhasil.'.
                                                        '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                    '</div>';
                                            echo "<meta http-equiv='refresh' content='2;
                                            url=?page=logbooklihatisi&id=$_GET[id]&idx=$_GET[idx]'";
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