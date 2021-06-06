<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Absensi</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Absensi</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="card text-white bg-info text-center" style="margin-bottom: 0px;">
                                        <div class="card-body">
                                            <h3>Hari ini: </h3>
                                            <h3><?= full_date_ind(date('D-d-m-Y')) ?></h3>
                                            <h3><span class="badge badge-secondary hour" style="margin-right: 5px;"></span><span class="badge badge-secondary minute" style="margin-right: 5px;"></span><span class="badge badge-secondary second" style="width: 38px;"></span></h3>
                                            <form action="?page=absensi" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" value="<?= !get_absensi(get_user_login('id_user')) ? '0' : get_absensi(get_user_login('id_user'))['id_pegawai'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if (!get_absensi(get_user_login('id_user'))) { ?>
                                                <div class="row" style="margin-top: 25px;">
                                                    <div class="col-md-12 text-center">
                                                        <div class="form-group">
                                                            <label for="name">Presensi</label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" id="inline-radio1" type="radio" value="WFO" name="presensi" required>
                                                                        <label class="form-check-label" for="inline-radio1">WFO</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" id="inline-radio2" type="radio" value="WFH" name="presensi" required>
                                                                        <label class="form-check-label" for="inline-radio2">WFH</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php if (!get_absensi(get_user_login('id_user'))['jam_pulang']) { ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" class="btn btn-secondary" value="Absensi">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </form>
                                            <?php 
                                            
                                            if (isset($_POST['submit'])) {
                                                $id_absensi = $uuid4->toString();
                                                $id_user    = get_user_login('id_user');
                                                $id         = $_POST['id'];
                                                $presensi   = isset($_POST['presensi']);
                                                $date_now   = date('Y-m-d H:i:s');
                                                $only_date  = date('Y-m-d');

                                                if ($id === '0') {
                                                    mysqli_query($conn, "INSERT INTO tbl_absensi SET
                                                                            id                    = '$id_absensi',
                                                                            id_pegawai            = '$id_user',
                                                                            jenis_presensi        = '$presensi',
                                                                            jam_masuk             = '$date_now'") or die (mysqli_error($conn));
                                                } else {
                                                    mysqli_query($conn, "UPDATE tbl_absensi SET
                                                                            jam_pulang            = '$date_now'
                                                                            WHERE created_at LIKE '%$only_date%' AND id_pegawai = '$id_user'") or die (mysqli_error($conn));
                                                }
                                                echo "<meta http-equiv='refresh' content='1;
                                                url=?page=absensi'>";
                                            }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="card text-white bg-success" style="margin-bottom: 0px;">
                                        <div class="card-body">
                                            <h3>Jenis Presensi: </h3>
                                            <?= !get_absensi(get_user_login('id_user')) ? '' : '<h4><span class="badge badge-info">'.get_absensi(get_user_login('id_user'))['jenis_presensi'].'</span></h4>'; ?>
                                            <h3>Presensi Masuk Yang Terekam: </h3>
                                            <?= !get_absensi(get_user_login('id_user')) ? '' : '<h4>'.date('H:i', strtotime(get_absensi(get_user_login('id_user'))['jam_masuk'])).'</h4>'; ?>
                                            <h3>Presensi Pulang Yang Terekam: </h3>
                                            <?= !get_absensi(get_user_login('id_user'))['jam_pulang'] ? '' : '<h4>'.date('H:i', strtotime(get_absensi(get_user_login('id_user'))['jam_pulang'])).'</h4>'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
$(document).ready(function(){
    var timer = setInterval(clock, 1)
    function clock(){
        $(".second").html(new Date().getSeconds() < 10 ? '0'+new Date().getSeconds() : new Date().getSeconds());
        $(".minute").html(new Date().getMinutes() < 10 ? '0'+new Date().getMinutes() : new Date().getMinutes());
        $(".hour").html(new Date().getHours() < 10 ? '0'+new Date().getHours() : new Date().getHours());
    }
});
</script>