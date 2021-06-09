<?php 

include "connection.php";

$id         = $_REQUEST['id'];
$id_user    = $_REQUEST['id_user'];
$id_absensi = $_REQUEST['id_absensi'];
$presensi   = $_REQUEST['presensi'];
$dateNow    = $_REQUEST['dateNow'];
$onlyDate   = $_REQUEST['onlyDate'];
$data;

if ($id == '0') {
   mysqli_query($conn, "INSERT INTO tbl_absensi SET
                        id                    = '$id_absensi',
                        id_pegawai            = '$id_user',
                        jenis_presensi        = '$presensi',
                        jam_masuk             = '$dateNow'") or die (mysqli_error($conn));
   $data = [
      "id"           => $id,
      "presensi"     => $presensi,
      "dateNow"      => date('H:i', strtotime($dateNow)),
   ];
} else {
   mysqli_query($conn, "UPDATE tbl_absensi SET
                        jam_pulang            = '$dateNow'
                        WHERE created_at LIKE '%$onlyDate%' AND id_pegawai = '$id'") or die (mysqli_error($conn));
   $data = [
      "id"           => $id,
      "presensi"     => $presensi,
      "dateNow"      => date('H:i', strtotime($dateNow)),
   ];
}



echo json_encode($data);

?>