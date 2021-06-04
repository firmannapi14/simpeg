<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Beranda</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-gradient-info">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-3xl">
                                    <use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg"><?= count_table('tbl_pegawai') ?></div>
                            <small class="text-muted text-uppercase font-weight-bold">Pegawai</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-gradient-danger">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-3xl">
                                    <use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg"><?= count_table('tbl_pimpinan') ?></div>
                            <small class="text-muted text-uppercase font-weight-bold">Pimpinan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>