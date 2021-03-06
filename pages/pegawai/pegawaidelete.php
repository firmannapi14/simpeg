<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="?page=pegawai">Pegawai</a></li>
        <li class="breadcrumb-item active">Delete Data</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Delete Data Pegawai</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        Yakin untuk menghapus data ini ?
                                        <form action="?page=pegawaidelete" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                            <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                                            <a href="?page=pegawai" class="btn btn-primary">Tidak</a>
                                        </form>
                                    </div>
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $delete     = mysqli_query($conn, "DELETE FROM tbl_auth WHERE id_pegawai='$id'");
                                            $delete2    = mysqli_query($conn, "DELETE FROM tbl_pegawai WHERE id='$id'");
                                            if ($delete && $delete2){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data berhasil dihapus.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span></button>'.
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