<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=logbook">Logbook</a></li>
        <li class="breadcrumb-item active">Delete Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Delete Data Logbook</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        Yakin untuk menghapus data ini kan ?
                                        <form action="?page=logbookisidelete" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $_GET['idx'] ?>">
                                            <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                                            <a href="?page=logbookisi&id=<?= $_GET['id'] ?>" class="btn btn-primary">Tidak</a>
                                        </form>
                                    </div>
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $idd        = $_GET['id'];
                                            $q          = mysqli_query($conn, "SELECT * FROM tbl_logbook_items WHERE id='$id'");
                                            $data       = mysqli_fetch_array($q);
                                            $file       = $data['dokumen'];
                                            unlink("file/$file");
                                            $delete     = mysqli_query($conn, "DELETE FROM tbl_logbook_items WHERE id='$id'");
                                            
                                            if ($delete){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil dihapus.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=logbookisi&id=$idd'>";
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