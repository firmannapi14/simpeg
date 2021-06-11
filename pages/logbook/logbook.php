<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Logbook</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row message"></div>
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
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Tahun</th>
                                                <th rowspan="2">Bulan</th>
                                                <th colspan="3">Tanggal</th>
                                                <th rowspan="2">Status</th>
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
                                        $id = get_user_login('id_user');
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_logbook
                                                                WHERE id_pegawai='$id'
                                                                ORDER BY bulan DESC, tahun DESC, updated_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['tahun']) ? $data['tahun'] : '-' ?></td>
                                                <td><?= !empty($data['bulan']) ? month_ind($data['bulan']) : '-' ?></td>
                                                <td><?= !empty($data['tgl_selesai_pengisian']) ? date('d M Y H:i:s', strtotime($data['tgl_selesai_pengisian'])) : '-' ?></td>
                                                <td><?= !empty($data['tgl_permohonan']) ? date('d F Y H:i:s', strtotime($data['tgl_permohonan'])) : '-' ?></td>
                                                <td><?= !empty($data['tgl_disetujui']) ? date('d F Y H:i:s', strtotime($data['tgl_disetujui'])) : '-' ?></td>
                                                <td><?= !empty($data['status']) ? label_status($data['status']) : '-' ?></td>
                                                <td>
                                                    <a href="?page=logbookisi&id=<?= $data['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-gear"></i> kelola</a>
                                                    <?php if (empty($data['tgl_selesai_pengisian'])) { ?>
                                                        <a href="?page=logbookedit&id=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                        <button class="btn btn-danger btn-sm btn-check" type="button" data-id="<?= $data['id'] ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> delete</button>
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
            url: 'config/delete_logbook.php',
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
});
</script>