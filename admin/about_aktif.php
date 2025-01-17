<?php
require_once('../config/koneksi.php');

// Pastikan ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update status 'aktif' menjadi 1 untuk data yang dipilih
    $sql = "UPDATE about_me SET aktif = 1 WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Update status 'aktif' menjadi 0 untuk data lainnya
        $sql = "UPDATE about_me SET aktif = 0 WHERE id != $id";
        $conn->query($sql);

        // Redirect ke halaman about.php dengan pesan berhasil
        echo "<script>alert('Data berhasil diaktifkan!'); window.location.href='about.php';</script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>alert('Gagal mengaktifkan data: " . $conn->error . "'); window.location.href='about.php';</script>";
    }
} else {
    // Jika ID tidak ada, tampilkan pesan error
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='about.php';</script>";
}
?>
