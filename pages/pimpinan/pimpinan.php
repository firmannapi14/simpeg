<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Beranda</a></li>
        <li class="breadcrumb-item active">Pimpinan</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Pimpinan</div>
                        <div class="card-body">
                            <?php if (get_user_login('id_rules') === '1') { ?>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=pimpinanadd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Pimpinan</a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-sm table-responsive-md table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Rules</th>
                                                <th>Nama Pimpinan</th>
                                                <th>Jabatan Pimpinan</th>
                                                <?php if (get_user_login('id_rules') === '1') { ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $nik = get_user_login('nik');
                                        $q = mysqli_query($conn, "SELECT * FROM tbl_pimpinan
                                                                JOIN tbl_rules ON tbl_pimpinan.id_rules=tbl_rules.id");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= !empty($data['nip']) ? $data['nip'] : '-' ?></td>
                                                <td><span class="badge badge-success"><?= !empty($data['nama_rules']) ? $data['nama_rules'] : '-' ?></span></td>
                                                <td><?= !empty($data['nama_pimpinan']) ? $data['nama_pimpinan'] : '-' ?></td>
                                                <td><?= !empty($data['jabatan_pimpinan']) ? $data['jabatan_pimpinan'] : '-' ?></td>
                                                <?php if (get_user_login('id_rules') === '1') { ?>
                                                <td>
                                                    <a href="?page=pimpinanedit&id=<?= $data['nip'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=pimpinandelete&id=<?= $data['nip'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
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