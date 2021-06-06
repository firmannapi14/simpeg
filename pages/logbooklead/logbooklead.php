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
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-xs table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Logbook</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT tbl_pegawai.id, tbl_pegawai.nik, tbl_pegawai.nama_pegawai, COUNT(tbl_logbook.id) as total_logbook FROM tbl_pegawai
                                                                JOIN tbl_logbook ON tbl_pegawai.id=tbl_logbook.id_pegawai
                                                                GROUP BY tbl_pegawai.id");

                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['nik']) ? $data['nik'] : '-' ?></td>
                                                <td><?= !empty($data['nama_pegawai']) ? $data['nama_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['total_logbook']) ? $data['total_logbook'].' bulan terlampir' : '-' ?></td>
                                                <td>
                                                    <a href="?page=logbooklihat&id=<?= $data['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> buka</a>
                                                </td>
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