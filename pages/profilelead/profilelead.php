<?php 
    $id = get_user_login('nip');
    $g = mysqli_query($conn, "SELECT * FROM tbl_pimpinan WHERE nip='$id'");
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
                        <a href="?page=profileedit&id=<?= $data['nip'] ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-edit"></i> Edit Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <tbody>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">NIP</td>
                                        <td><?= !empty($data['nip']) ? $data['nip'] : '-'  ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Nama</td>
                                        <td><?= !empty($data['nama_pimpinan']) ? $data['nama_pimpinan'] : '-' ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px" style="font-weight: bold;">Jabatan</td>
                                        <td><?= !empty($data['jabatan_pimpinan']) ? $data['jabatan_pimpinan'] : '-' ?></td>
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