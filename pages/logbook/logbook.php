<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Logbook</li>
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
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=logbookadd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Logbook</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-xs table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Tanggal Selesai Pengisian</th>
                                                <th>Status Terakhir</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $nik = get_user_login('nik');
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook
                                                                WHERE nik='$nik'
                                                                ORDER BY bulan DESC, tahun DESC, created_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['tahun']) ? $data['tahun'] : '-' ?></td>
                                                <td><?= !empty($data['bulan']) ? month_ind($data['bulan']) : '-' ?></td>
                                                <td><?= !empty($data['tgl_selesai_pengisian']) ? date_ind($data['tgl_selesai_pengisian']) : '-' ?></td>
                                                <td><?= !empty($data['status']) ? $data['status'] : '-' ?></td>
                                                <!-- <td>
                                                    <a href="?page=pegawaiedit&id=<?= $data['nik'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=pegawaidelete&id=<?= $data['nik'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
                                                </td> -->
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>