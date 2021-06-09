<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$comment    = $_REQUEST['comment'];
$data;

$insert = mysqli_query($conn, "UPDATE tbl_logbook SET
                                komentar  = '$comment'
                                WHERE id  = '$id'") or die (mysqli_error($conn));

if ($insert) {
    $data = [
        "statusMessage"    => 'Ok',
        "statusCode"       => 200,
    ];
}

echo json_encode($data);

?>