<?php
    $g = mysqli_query($conn, "SELECT * FROM tbl_logbook
                            WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
    $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items WHERE id_logbook='$_GET[id]'");
    $count = mysqli_num_rows($q);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?></li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <?php if (!empty($data['tgl_selesai_pengisian'])) { ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Info!</strong> Isi logbook sudah tidak dapat diubah karena proses pengisian telah selesai <i class="fa fa-check-circle"></i>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    </div> 
                </div>
            <?php } ?>
            <div class="row message"></div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Logbook <?= month_ind($data['bulan']) ?> <?= $data['tahun'] ?>
                            <a href="?page=logbook" class="btn btn-primary btn-sm float-right ml-1"><i class="fa fa-chevron-left"></i> kembali</a>
                            <?php if (empty($data['tgl_selesai_pengisian']) && $count > 0) { ?>
                                <button class="btn btn-success btn-sm float-right btn-check-finish" type="button" data-id="<?= $_GET['id'] ?>" data-toggle="modal" data-target="#myModalFinish"><i class="fa fa-check-circle"></i> selesaikan pengisian</button>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                        <a href="?page=logbookisiadd&id=<?= $_GET['id'] ?>" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Logbook</a>
                                    <?php } ?>
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
                                                <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                                    <th>Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook_items
                                                                WHERE id_logbook='$_GET[id]'
                                                                ORDER BY tanggal ASC, mulai ASC");
                                        while($datas=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($datas['tanggal']) ? date_ind($datas['tanggal']) : '-' ?></td>
                                                <td><?= !empty($datas['mulai']) || !empty($datas['selesai']) ? date('H:i', strtotime($datas['mulai'])).' - '.date('H:i', strtotime($datas['selesai'])) : '-' ?></td>
                                                <td><?= !empty($datas['uraian_kegiatan']) ? $datas['uraian_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($datas['hasil_kegiatan']) ? $datas['hasil_kegiatan'] : '-' ?></td>
                                                <td><?= !empty($datas['dokumen']) ? '<a href="file/'.$datas['dokumen'].'" class="text-info" target="_blank">'.$datas['dokumen'].'</a>' : '-' ?></td>
                                                <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                                    <td>
                                                        <a href="?page=logbookisiedit&id=<?= $_GET['id'] ?>&idx=<?= $datas['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                        <button class="btn btn-danger btn-sm btn-check" type="button" data-id="<?= $datas['id'] ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> delete</button>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <p>Yakin untuk menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger submit-btn" type="button">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalFinish" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_finish" value="">
                    <p>Yakin telah menyelesaikan logbook ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-success submit-btn-finish" type="button">Ya</button>
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
        var idx = $('input[name="id"]').val();
    
        $.ajax({
            url: 'config/delete_logbook_items.php',
            tyle: 'post',
            data: { 'id': idx },
            success: function(res) {
                data = jQuery.parseJSON(res);
                if (data.statusCode === 200) {
                    $('#myModal').modal('hide');
                    message = '<div class="col-lg-12 col-md-12 col-xs-12">';
                    message += '<div class="alert alert-success alert-dismissible fade show alert-message" role="alert"><strong>Info!</strong> Data berhasil dihapus <i class="fa fa-check-circle"></i>';
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

    $('.btn-check-finish').on('click',function(){
        var idFinish = $(this).data('id');
        $('input[name="id_finish"]').val(idFinish);
    });

    $('.submit-btn-finish').on('click',function(){
        var idFinish = $('input[name="id_finish"]').val();
    
        $.ajax({
            url: 'config/finish_logbook.php',
            tyle: 'post',
            data: { 'id': idFinish },
            success: function(res) {
                data = jQuery.parseJSON(res);
                if (data.statusCode === 200) {
                    $('#myModalFinish').modal('hide');
                    message = '<div class="col-lg-12 col-md-12 col-xs-12">';
                    message += '<div class="alert alert-success alert-dismissible fade show alert-message" role="alert"><strong>Info!</strong> Pengisian logbook telah selesai <i class="fa fa-check-circle"></i>';
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