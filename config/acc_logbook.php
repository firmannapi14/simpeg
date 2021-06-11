<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$id_user    = $_REQUEST['id_user'];
$dateNow    = date('Y-m-d H:i:s');
$data;

$update = mysqli_query($conn, "UPDATE tbl_logbook SET
                            id_pimpinan     = '$id_user',
                            tgl_disetujui   = '$dateNow',
                            status          = 'D'
                            WHERE id        = '$id'") or die (mysqli_error($conn));

if ($update) {
    $data = [
        "statusMessage"    => 'Ok',
        "statusCode"       => 200,
    ];
}

echo json_encode($data);

?>