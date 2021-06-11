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
            <div class="row message"></div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= $data['nama_pegawai'] ?>
                            <a href="?page=logbooklihat&id=<?= $_GET['idx'] ?>" class="btn btn-primary btn-sm float-right ml-1"><i class="fa fa-chevron-left"></i> kembali</a>
                            <?php if (get_user_login('id_rules') == '3' && empty($data['tgl_disetujui']) && !empty($data['tgl_selesai_pengisian']) && $count > 0) { ?>
                                <button class="btn btn-success btn-sm float-right btn-check" type="button" data-id="<?= $_GET['id'] ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-check-circle"></i> acc logbook</button>
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
                                                            <?php if (!empty($data['tgl_disetujui']) || !empty($data['komentar_lead_sub'])) { ?>
                                                            <tr>
                                                                <td><?= get_data_pimpinan($data['id_pimpinan'])['nama_pimpinan'] ?></td>
                                                                <td><?= !empty($data['tgl_disetujui']) ? date('d M Y H:i:s', strtotime($data['tgl_disetujui'])) : '-' ?></td>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="id_user" value="<?= get_user_login('id_user') ?>">
                    <p>Yakin untuk acc logbook ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-success submit-btn" type="button">Ya</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
$(document).ready(function(){
    
    $('.btn-check').on('click',function(){
        var id = $(this).data('id');
        $('input[name="id"]').val(id);
    });

    $('.submit-btn').on('click',function(){
        var idx = $('input[name="id"]').val(),
            idUser = $('input[name="id_user"]').val();
    
        $.ajax({
            url: 'config/acc_logbook.php',
            tyle: 'post',
            data: { 'id': idx, 'id_user': idUser },
            success: function(res) {
                data = jQuery.parseJSON(res);
                if (data.statusCode === 200) {
                    $('#myModal').modal('hide');
                    message = '<div class="col-lg-12 col-md-12 col-xs-12">';
                    message += '<div class="alert alert-success alert-dismissible fade show alert-message" role="alert"><strong>Info!</strong> Acc logbook berhasil <i class="fa fa-check-circle"></i>';
                    message += '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div></div>';
                    $('.message').append(message);
                    $('.message').show(500);
                    setTimeout(() => { 
                        location.reload(true);
                    }, 1500);
                } else {
                    console.log('something wrong !!')
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    });
});
</script>