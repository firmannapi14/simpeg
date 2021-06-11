<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$data;

$q          = mysqli_query($conn, "SELECT * FROM tbl_logbook_items WHERE id_logbook='$id'");
$count      = mysqli_num_rows($q);

if ($count > 0) {
    while($data = mysqli_fetch_array($q)) {
        unlink("../file/$data[dokumen]");
    }
    mysqli_query($conn, "DELETE FROM tbl_logbook_items WHERE id_logbook='$id'");
    $delete = mysqli_query($conn, "DELETE FROM tbl_logbook WHERE id='$id'");
} else {
    $delete = mysqli_query($conn, "DELETE FROM tbl_logbook WHERE id='$id'");
}

if ($delete) {
    $data = [
        "statusMessage"    => 'Ok',
        "statusCode"       => 200,
    ];
}

echo json_encode($data);

?>