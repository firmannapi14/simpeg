<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_pegawai 
                            WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item"><a href="?page=logbook">Logbook</a></li>
        <li class="breadcrumb-item active">Data Logbook <?= $data['nik'] ?></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= $data['nik'] ?>
                            <a href="?page=logbook" class="btn btn-primary btn-sm float-right"><i class="fa fa-chevron-left"></i> kembali</a>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Tahun</th>
                                                <th rowspan="2">Bulan</th>
                                                <th colspan="3">Tanggal</th>
                                                <th rowspan="2">Status</th>
                                                <th rowspan="2">Komentar</th>
                                                <th rowspan="2">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th>Selesai pengisian</th>
                                                <th>Permohonan</th>
                                                <th>Disetujui</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook 
                                                                WHERE id_pegawai='$_GET[id]'
                                                                ORDER BY bulan DESC, tahun DESC, updated_at DESC");

                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['tahun']) ? $data['tahun'] : '-' ?></td>
                                                <td><?= !empty($data['bulan']) ? month_ind($data['bulan']) : '-' ?></td>
                                                <td><?= !empty($data['tgl_selesai_pengisian']) ? date('d F Y H:i:s', strtotime($data['tgl_selesai_pengisian'])) : '-' ?></td>
                                                <td><?= !empty($data['tgl_permohonan']) ? date('d F Y H:i:s', strtotime($data['tgl_permohonan'])) : '-' ?></td>
                                                <td><?= !empty($data['tgl_disetujui']) ? date('d F Y H:i:s', strtotime($data['tgl_disetujui'])) : '-' ?></td>
                                                <td><?= !empty($data['status']) ? label_status($data['status']) : '-' ?></td>
                                                <td><?= !empty($data['komentar']) ? $data['komentar'] : '-' ?></td>
                                                <td>
                                                    <a href="?page=logbooklihatisi&id=<?= $data['id'] ?>&idx=<?= $data['id_pegawai'] ?>" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> buka</a>
                                                    <?php if (!empty($data['tgl_selesai_pengisian']) && empty($data['komentar']) && get_user_login('id_rules') == '4') { ?>
                                                    <button class="btn btn-info btn-sm btn-check" type="button" data-id="<?= $data['id'] ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-comment"></i> komentar</button>
                                                    <?php } ?>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Isi Komentar</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="id" value="">
                                <textarea class="form-control isi" name="hasil_kegiatan" rows="3" placeholder="Tuliskan Komentar ..." style="resize: none;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary submit-btn" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
$(function() {
    $('.isi').val('');
});
$(document).ready(function(){

    $('.btn-check').on('click',function(){
        var id = $(this).data('id');
        $('input[name="id"]').val(id);
    });

    $('.submit-btn').on('click',function(){
        var idx = $('input[name="id"]').val(),
            comment = $('.isi').val();
            
            if (!comment) {
                alert('Isi komentar terlebih dahulu');
            } else {
                $.ajax({
                    url: 'config/post_comment.php',
                    tyle: 'post',
                    data: { 'id': idx, 'comment': comment },
                    success: function(res) {
                        data = jQuery.parseJSON(res);
                        if (data.statusCode === 200) {
                            $('#myModal').modal('hide');
                            location.reload(true);
                        } else {
                            console.log('something wrong !!')
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            }
    });

});
</script>