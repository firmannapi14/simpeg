<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            JOIN tbl_pegawai ON tbl_logbook.id_pegawai=tbl_pegawai.id
                            WHERE tbl_pegawai.id='$_GET[idx]' AND tbl_logbook.id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
    $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items WHERE id_logbook='$_GET[id]'");
    $count = mysqli_num_rows($q);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item"><a href="?page=logbook">Logbook</a></li>
        <li class="breadcrumb-item active">Data Logbook <?= $data['nama_pegawai'] ?></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= $data['nama_pegawai'] ?>
                            <a href="?page=logbooklihat&id=<?= $_GET['idx'] ?>" class="btn btn-primary btn-sm float-right ml-1"><i class="fa fa-chevron-left"></i> kembali</a>
                            <?php if (get_user_login('id_rules') == '3' && empty($data['tgl_disetujui']) && !empty($data['tgl_selesai_pengisian']) && $count > 0) { ?>
                                <a href="?page=logbookaccisi&id=<?= $_GET['id'] ?>&idx=<?= $_GET['idx'] ?>" class="btn btn-success btn-sm float-right"><i class="fa fa-check-circle"></i> acc logbook</a>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
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
                                                <td width="200px" style="font-weight: bold;">Jenis Kelamin</td>
                                                <td><?= $data['jenis_kelamin_pegawai'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Jabatan</td>
                                                <td><?= !empty($data['jabatan_pegawai']) ? $data['jabatan_pegawai'] : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Logbook Bulan</td>
                                                <td><?= !empty($data['bulan']) ? month_ind($data['bulan']) : '-' ?></td>
                                            </tr>
                                            <tr>
                                                <td width="200px" style="font-weight: bold;">Riwayat Persetujuan</td>
                                                <td>
                                                    <?php if (!empty($data['tgl_selesai_pengisian'])) { ?>
                                                    <table class="table table-responsive-sm table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Persetujuan</th>
                                                                <th>Tanggal</th>
                                                                <th>Komentar</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($data['tgl_selesai_pengisian']) || !empty($data['komentar_lead_sub'])) { ?>
                                                            <tr>
                                                                <td>Dian Yudistira, S.Kom., M.Kom.</td>
                                                                <td><?= date('d M Y H:i:s', strtotime($data['tgl_selesai_pengisian'])) ?></td>
                                                                <td><?= !empty($data['komentar_lead_koor']) ? $data['komentar_lead_koor'] : '-' ?></td>
                                                                <td><span class="badge badge-info">Permohonan Persetujuan</span></td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if (!empty($data['tgl_disetujui']) || !empty($data['komentar_lead_koor'])) { ?>
                                                            <tr>
                                                                <td><?= get_data_pimpinan($data['id_pimpinan'])['nama_pimpinan'] ?></td>
                                                                <td><?= date('d M Y H:i:s', strtotime($data['tgl_disetujui'])) ?></td>
                                                                <td><?= !empty($data['komentar_lead_sub']) ? $data['komentar_lead_sub'] : '-' ?></td>
                                                                <td><?= $data['status'] == 'D' ? label_status($data['status']) : '-' ?></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php } else { echo '-'; } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-xs table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Pukul</th>
                                                <th>Uraian Kegiatan</th>
                                                <th>Hasil Kegiatan</th>
                                                <th>Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items
                                                                WHERE id_logbook='$_GET[id]'
                                                                ORDER BY tanggal ASC, mulai ASC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['tanggal']) ? date_ind($data['tanggal']) : '-' ?></td>
                                                <td><?= !empty($data['mulai']) || !empty($data['selesai']) ? date('H:i', strtotime($data['mulai'])).' - '.date('H:i', strtotime($data['selesai'])) : '-' ?></td>
                                                <td><?= !empty($data['uraian_kegiatan']) ? $data['uraian_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($data['hasil_kegiatan']) ? $data['hasil_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($data['dokumen']) ? '<a href="file/'.$data['dokumen'].'" class="text-info" target="_blank">'.$data['dokumen'].'</a>' : '-' ?></td>
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