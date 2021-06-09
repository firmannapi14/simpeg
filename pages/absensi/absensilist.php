<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Rekap Absensi</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Rekap Absensi</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-sm table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jenis Presensi</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Pulang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $id = get_user_login('id_user');
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_absensi
                                                                WHERE id_pegawai='$id'
                                                                ORDER BY created_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['created_at']) ? full_date_ind(date('D-d-m-Y', strtotime($data['created_at']))) : '-' ?></td>
                                                <td><?= !empty($data['jenis_presensi']) ? '<span class="badge badge-info">'.$data['jenis_presensi'].'</span>' : '-' ?></td>
                                                <td><?= !empty($data['jam_masuk']) ? date('H:i', strtotime($data['jam_masuk'])) : '-' ?></td>
                                                <td><?= !empty($data['jam_pulang']) ? date('H:i', strtotime($data['jam_pulang'])) : '-' ?></td>
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