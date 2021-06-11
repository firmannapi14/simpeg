<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$dateNow    = date('Y-m-d H:i:s');
$data;

$update = mysqli_query($conn, "UPDATE tbl_logbook SET
                            tgl_selesai_pengisian   = '$dateNow',
                            tgl_permohonan          = '$dateNow',
                            status                  = 'D'
                            WHERE id                = '$id'") or die (mysqli_error($conn));

if ($update) {
    $data = [
        "statusMessage"    => 'Ok',
        "statusCode"       => 200,
    ];
}

echo json_encode($data);

?>