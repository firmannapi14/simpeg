<?php
    $q = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE id='$_GET[id]'");
    $dataq = mysqli_fetch_array($q);
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook_items
                            WHERE id='$_GET[idx]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbookisi&id=<?= $_GET['id'] ?>">Logbook <?= month_ind($dataq['bulan']) ?> <?= $dataq['tahun'] ?></a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Logbook <?= month_ind($dataq['bulan']) ?> <?= $dataq['tahun'] ?></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id                 = $_GET['idx'];
                                            $tanggal            = date('Y-m-d', strtotime($_POST['tanggal']));
                                            $mulai              = $_POST['mulai'];
                                            $selesai            = $_POST['selesai'];
                                            $uraian_kegiatan    = $_POST['uraian_kegiatan'];
                                            $hasil_kegiatan     = $_POST['hasil_kegiatan'];

                                            $old_file           = $_POST['old_file'];
                                            $nama_doc           = $_FILES['file']['name'];
                                            $loc_doc            = $_FILES['file']['tmp_name'];
                                            $x                  = explode('.',$nama_doc);
                                            $extension          = strtolower(end($x));

                                            if (!empty($nama_doc)) {
                                                $newfilename = $uuid4->toString().".".$extension;
                                                unlink("file/$old_file");
                                                move_uploaded_file($loc_doc,"file/$newfilename");
                                            } else {
                                                $newfilename = $old_file;
                                            }

                                            $insert = mysqli_query($conn, "UPDATE tbl_logbook_items SET
                                                                        tanggal         = '$tanggal',
                                                                        mulai           = '$mulai',
                                                                        selesai         = '$selesai',
                                                                        uraian_kegiatan = '$uraian_kegiatan',
                                                                        hasil_kegiatan  = '$hasil_kegiatan',
                                                                        dokumen         = '$newfilename'
                                                                        WHERE   id      = '$id'") or die (mysqli_error($conn));
                                            
                                            if ($insert) {
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil disimpan.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=logbookisi&id=$_GET[id]'";
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