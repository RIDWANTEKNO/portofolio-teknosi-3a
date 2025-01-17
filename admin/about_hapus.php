<?php
require_once('../config/koneksi.php');

// Pastikan ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pastikan ID valid dan merupakan angka
    if (is_numeric($id)) {
        // Ambil data untuk memastikan data yang akan dihapus ada
        $query = mysqli_query($conn, "SELECT * FROM about_me WHERE id = $id");
        $about_me = mysqli_fetch_assoc($query);

        // Jika data tidak ditemukan
        if ($about_me == null) {
            echo "<script>alert('Data tidak ditemukan!'); window.location.href='about.php';</script>";
            exit;
        }

        // Hapus data berdasarkan ID
        $sql = "DELETE FROM about_me WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.href='about.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data: " . $conn->error . "'); window.location.href='about.php';</script>";
        }
    } else {
        // Jika ID tidak valid
        echo "<script>alert('ID tidak valid!'); window.location.href='about.php';</script>";
    }
} else {
    // Jika ID tidak ditemukan di URL
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='about.php';</script>";
}
?>
