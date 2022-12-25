<?php  
session_start();
include "../../koneksi.php";

// ambil data dari form
$id = $_GET['id'];
$qty = $_GET['qty'];

$query = "UPDATE tb_detail_order SET jumlah_dorder='$qty' WHERE id_dorder='$id'";
$sql = mysqli_query($kon, $query);

if ($sql) {
  $_SESSION['pesan'] = '
  <div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
    <b>Berhasil!</b> Data berhasil diubah
    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
  </div>
  ';
  echo json_encode("success");
} else {
  $_SESSION['pesan'] = '
  <div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
    <b>Gagal!</b> Data gagal diubah
    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
  </div>
  ';
  echo json_encode("failed");
}

?>