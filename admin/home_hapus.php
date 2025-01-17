<?php
require_once('../config/koneksi.php');
$id = $_GET['id'];
$sql = "DELETE FROM home WHERE id = $id";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Data berhasil dihapus !'); window.location.href='home.php';</script>";
} else {
  echo "<script>alert('Gagal menghapus data: " . $conn->error . "');</script>";
}
