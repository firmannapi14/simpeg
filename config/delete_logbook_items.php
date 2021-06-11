<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$data;

$q          = mysqli_query($conn, "SELECT * FROM tbl_logbook_items WHERE id='$id'") or die (mysqli_error($conn));
$data       = mysqli_fetch_array($q);
$file       = $data['dokumen'];
            unlink("../file/$file");
$delete     = mysqli_query($conn, "DELETE FROM tbl_logbook_items WHERE id='$id'") or die (mysqli_error($conn));

if ($delete) {
    $data = [
        "statusMessage"    => 'Ok',
        "statusCode"       => 200,
    ];
}

echo json_encode($data);

?>