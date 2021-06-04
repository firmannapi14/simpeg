<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE nik='$_GET[nik]' AND id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbook&nik=<?= $_GET['nik'] ?>&id=<?= $_GET['id'] ?>">Logbook</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id                 = $uuid4->toString();
                                            $id_logbook         = $_GET['id'];
                                            $tanggal            = date('Y-m-d', strtotime($_POST['tanggal']));
                                            $mulai              = $_POST['mulai'];
                                            $selesai            = $_POST['selesai'];
                                            $uraian_kegiatan    = $_POST['uraian_kegiatan'];
                                            $hasil_kegiatan     = $_POST['hasil_kegiatan'];

                                            $nama_doc           = $_FILES['file']['name'];
                                            $loc_doc            = $_FILES['file']['tmp_name'];
                                            $x                  = explode('.',$nama_doc);
                                            $extension          = strtolower(end($x));

                                            if (!empty($nama_doc)) {
                                                $newfilename = $uuid4->toString().".".$extension;
                                                move_uploaded_file($loc_doc,"file/$newfilename");
                                            }

                                            $insert = mysqli_query($conn, "INSERT INTO tbl_logbook_items SET
                                                                        id              = '$id',
                                                                        id_logbook      = '$id_logbook',
                                                                        tanggal         = '$tanggal',
                                                                        mulai           = '$mulai',
                                                                        selesai         = '$selesai',
                                                                        uraian_kegiatan = '$uraian_kegiatan',
                                                                        hasil_kegiatan  = '$hasil_kegiatan',
                                                                        dokumen         = '$newfilename'") or die (mysqli_error($conn));
                                            
                                            if ($insert) {
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil disimpan.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=logbookisi&nik=$_GET[nik]&id=$_GET[id]'";
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