<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbook&id=<?= $_GET['id'] ?>">Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></a></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        $id_logbook         = $_GET['id'];
                                        $dateNow            = date('Y-m-d H:i:s');

                                        $insert = mysqli_query($conn, "UPDATE tbl_logbook SET
                                                                    tgl_selesai_pengisian   = '$dateNow',
                                                                    tgl_permohonan          = '$dateNow',
                                                                    status                  = 'PP'
                                                                    WHERE id                = '$id_logbook'") or die (mysqli_error($conn));
                                        
                                        if ($insert) {
                                            echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Pengisian logbook selesai.'.
                                                        '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                    '</div>';
                                            echo "<meta http-equiv='refresh' content='2;
                                            url=?page=logbook'";
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