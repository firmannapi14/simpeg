<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Pegawai</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Pegawai</div>
                        <div class="card-body">
                            <?php if (get_user_login('id_rules') === '1') { ?>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=pegawaiadd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Pegawai</a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Rules</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Golongan Darah</th>
                                                <th>Alamat</th>
                                                <th>Status Pernikahan</th>
                                                <th>Agama</th>
                                                <th>Pekerjaan</th>
                                                <th>Kewarganegaraan</th>
                                                <th>Pendidikan</th>
                                                <th>Jurusan</th>
                                                <th>Jabatan</th>
                                                <th>No Tlp</th>
                                                <th>No NPWP</th>
                                                <th>No BPJS</th>
                                                <th>No Rekening</th>
                                                <?php if (get_user_login('id_rules') === '1') { ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $nik = get_user_login('nik');
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_pegawai
                                                                JOIN tbl_rules ON tbl_pegawai.id_rules=tbl_rules.id
                                                                WHERE tbl_pegawai.nik <> '$nik'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['nik']) ? $data['nik'] : '-' ?></td>
                                                <td><span class="badge badge-success"><?= !empty($data['nama_rules']) ? $data['nama_rules'] : '-' ?></span></td>
                                                <td><?= !empty($data['nama_pegawai']) ? $data['nama_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['tempat_lahir_pegawai']) ? $data['tempat_lahir_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['tanggal_lahir_pegawai']) ? date_ind($data['tanggal_lahir_pegawai']) : '-' ?></td>
                                                <td><?= !empty($data['jenis_kelamin_pegawai']) ? $data['jenis_kelamin_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['golongan_darah_pegawai']) ? $data['golongan_darah_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['alamat_pegawai']) ? $data['alamat_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['status_pernikahan_pegawai']) ? $data['status_pernikahan_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['agama_pegawai']) ? $data['agama_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['pekerjaan_pegawai']) ? $data['pekerjaan_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['kewarganegaraan_pegawai']) ? $data['kewarganegaraan_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['pendidikan_pegawai']) ? $data['pendidikan_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['jurusan_pegawai']) ? $data['jurusan_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['jabatan_pegawai']) ? $data['jabatan_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['no_telepon_pegawai']) ? $data['no_telepon_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['no_npwp_pegawai']) ? $data['no_npwp_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['no_bpjs_pegawai']) ? $data['no_bpjs_pegawai'] : '-' ?></td>
                                                <td><?= !empty($data['no_rekening_pegawai']) ? $data['no_rekening_pegawai'] : '-' ?></td>
                                                <?php if (get_user_login('id_rules') === '1') { ?>
                                                <td>
                                                    <a href="?page=pegawaiedit&id=<?= $data['nik'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=pegawaidelete&id=<?= $data['nik'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
                                                </td>
                                                <?php } ?>
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