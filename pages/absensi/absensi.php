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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" value="<?= !get_absensi(get_user_login('id_user')) ? '0' : get_absensi(get_user_login('id_user'))['id_pegawai'] ?>">
                                                        <input type="hidden" name="id_absensi" value="<?= $uuid4->toString() ?>">
                                                        <input type="hidden" name="id_user" value="<?= get_user_login('id_user') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (!get_absensi(get_user_login('id_user'))) { ?>
                                            <div class="row presensi-box" style="margin-top: 25px;">
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
                                                        <input type="submit" name="submit" class="btn btn-secondary submit-btn" value="Absensi Masuk">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="row goto-logbook" style="<?= get_absensi(get_user_login('id_user'))['jam_pulang'] && get_absensi(get_user_login('id_user'))['jam_masuk'] ? '' : 'display: none;' ?>">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <a href="?page=logbook" class="btn btn-secondary">Isi Logbook</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="card text-white bg-success" style="margin-bottom: 0px;">
                                        <div class="card-body">
                                            <h3>Jenis Presensi: </h3>
                                            <h4><span id="presensi-out" class="badge badge-info"><? !get_absensi(get_user_login('id_user')) ? '' : get_absensi(get_user_login('id_user'))['jenis_presensi'] ?></span></h4>
                                            <h3>Presensi Masuk Yang Terekam: </h3>
                                            <h4 id="masuk-out"><?= !get_absensi(get_user_login('id_user')) ? '' : date('H:i', strtotime(get_absensi(get_user_login('id_user'))['jam_masuk'])) ?></h4>
                                            <h3>Presensi Pulang Yang Terekam: </h3>
                                            <h4 id="pulang-out"><?= !get_absensi(get_user_login('id_user'))['jam_pulang'] ? '' : date('H:i', strtotime(get_absensi(get_user_login('id_user'))['jam_pulang'])) ?></h4>
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

    $('.submit-btn').click(function(){
        var valueRadio = $('input[name="presensi"]:checked').val(),
            valueId = $('input[name="id"]').val(),
            valueIdUser = $('input[name="id_user"]').val(),
            valueIdAbsensi = $('input[name="id_absensi"]').val(),
            valueMonth = new Date().getMonth() < 10 ? '0'+(new Date().getMonth() + 1) : new Date().getMonth(),
            valueDay = new Date().getDate() < 10 ? '0'+new Date().getDate() : new Date().getDate(),
            valueSeconds = new Date().getSeconds() < 10 ? '0'+new Date().getSeconds() : new Date().getSeconds(),
            valueMinutes = new Date().getMinutes() < 10 ? '0'+new Date().getMinutes() : new Date().getMinutes(),
            valueHours = new Date().getHours() < 10 ? '0'+new Date().getHours() : new Date().getHours(),
            valueDateNow = new Date().getFullYear()+'-'+valueMonth+'-'+valueDay+' '+valueHours+':'+valueMinutes+':'+valueSeconds,
            valueOnlyDate = new Date().getFullYear()+'-'+valueMonth+'-'+valueDay,
            data;
        
        if (!valueRadio) {
            alert('Pilih presensi terlebih dahulu');
        } else {
            $.ajax({
                url: 'config/data_post.php',
                tyle: 'post',
                data: valueId == '0' 
                        ? { 'id': valueId, 'id_user': valueIdUser, 'id_absensi': valueIdAbsensi, 'presensi': valueRadio, 'dateNow': valueDateNow, 'onlyDate': valueOnlyDate } 
                        : { 'id': valueId, 'id_user': valueIdUser, 'id_absensi': valueIdAbsensi, 'presensi': '', 'dateNow': valueDateNow, 'onlyDate': valueOnlyDate} ,
                success: function(res) {
                    data = jQuery.parseJSON(res);
                    if (data.id == '0') {
                        $('input[name="id"]').val(valueIdUser);
                        $('.submit-btn').val('Absensi Pulang');
                        $('#presensi-out').append(data.presensi);
                        $('#masuk-out').append(data.dateNow);
                        $('.presensi-box').css("display","none");
                    } else {
                        $('#pulang-out').append(data.dateNow);
                        $('.submit-btn').css("display","none");
                        $('.goto-logbook').css("display","block");
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }
    })
});
</script>