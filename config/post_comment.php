<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$id_rules   = $_REQUEST['id_rules'];
$id_user    = $_REQUEST['id_user'];
$comment    = $_REQUEST['comment'];
$data;

if ($id_rules == '3') {
    $insert = mysqli_query($conn, "UPDATE tbl_logbook SET
                                komentar_lead_sub   = '$comment',
                                id_pimpinan         = '$id_user'
                                WHERE id            = '$id'") or die (mysqli_error($conn));
} else {
    $insert = mysqli_query($conn, "UPDATE tbl_logbook SET
                                komentar_lead_koor  = '$comment'
                                WHERE id            = '$id'") or die (mysqli_error($conn));
}


if ($insert) {
    $data = [
        "statusMessage"    => 'Ok',
        "statusCode"       => 200,
    ];
}

echo json_encode($data);

?>