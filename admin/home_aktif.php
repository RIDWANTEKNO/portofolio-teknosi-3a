<?php
require_once('../config/koneksi.php');
$id = $_GET['id'];
$sql = "UPDATE home SET aktif = 1 WHERE id = $id";
if ($conn->query($sql) === TRUE) {
  $sql = "UPDATE home SET aktif = 0 WHERE id != $id";
  $conn->query($sql);
  echo "<script>alert('Data berhasil diaktifkan !'); window.location.href='home.php';</script>";
} else {
  echo "<script>alert('Gagal mengaktifkan data: " . $conn->error . "');</script>";
}
