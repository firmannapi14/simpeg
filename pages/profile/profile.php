<?php 
    $id = get_user_login('nik');
    $g = mysqli_query($conn, "SELECT * FROM tbl_pegawai WHERE nik='$id'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Data Profile</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Profile
                        <a href="?page=profileedit&id=<?= $data['nik'] ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-edit"></i> Edit Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <tbody>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">NIK</td>
                                        <td><?= !empty($data['nik']) ? $data['nik'] : '-'  ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Nama</td>
                                        <td><?= !empty($data['nama_pegawai']) ? $data['nama_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Tempat Lahir</td>
                                        <td><?= !empty($data['tempat_lahir_pegawai']) ? $data['tempat_lahir_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Tanggal Lahir</td>
                                        <td><?= !empty($data['tanggal_lahir_pegawai']) ? date_ind($data['tanggal_lahir_pegawai']) : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Jenis Kelamin</td>
                                        <td><?= empty($data['jenis_kelamin_pegawai']) ? '-' : $data['jenis_kelamin_pegawai'] === 'P' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Golongan Darah</td>
                                        <td><?= !empty($data['golongan_darah_pegawai']) ? $data['golongan_darah_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Alamat</td>
                                        <td><?= !empty($data['alamat_pegawai']) ? $data['alamat_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Status Pernikahan</td>
                                        <td><?= !empty($data['status_pernikahan_pegawai']) ? $data['status_pernikahan_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Agama</td>
                                        <td><?= !empty($data['agama_pegawai']) ? $data['agama_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Pekerjaan</td>
                                        <td><?= !empty($data['pekerjaan_pegawai']) ? $data['pekerjaan_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Kewarganegaraan</td>
                                        <td><?= !empty($data['kewarganegaraan_pegawai']) ? $data['kewarganegaraan_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Pendidikan</td>
                                        <td><?= !empty($data['pendidikan_pegawai']) ? $data['pendidikan_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Jurusan</td>
                                        <td><?= !empty($data['jurusan_pegawai']) ? $data['jurusan_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Jabatan</td>
                                        <td><?= !empty($data['jabatan_pegawai']) ? $data['jabatan_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">No Telepon</td>
                                        <td><?= !empty($data['no_telepon_pegawai']) ? $data['no_telepon_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">No NPWP</td>
                                        <td><?= !empty($data['no_npwp_pegawai']) ? $data['no_npwp_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">No BPJS</td>
                                        <td><?= !empty($data['no_bpjs_pegawai']) ? $data['no_bpjs_pegawai'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">No Rekening</td>
                                        <td><?= !empty($data['no_rekening_pegawai']) ? $data['no_rekening_pegawai'] : '-' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>