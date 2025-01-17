<?php
$menu_aktif = "about";
$judul_halaman = "Tambah Data about";
require_once('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan/</span> <a href="about.php">About me</a>/<a href="about_tambah.php">Tambah Data About me</a></h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <a href="about.php" class="btn btn-warning btn-sm"><i class="bx bx-back"></i> Kembali</a>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="nama">Nama saya *</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Silahkan masukkan nama anda" required />
              </div>
              <div class="mb-3">
                <label class="form-label" for="foto">Pilih Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="konten">Tentang saya *</label>
                <textarea name="konten" id="konten" class="tinymce"></textarea>
              </div>
              <hr class="mt-5">
              <div class="row justify-content-center">
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $conn->real_escape_string($_POST['nama']);
  $foto = null;
  $konten = $conn->real_escape_string($_POST['konten']);
  

  if (isset($_FILES['foto'])) {
    $targetDir = "assets/uploads/";
    // Cek apakah folder target ada, jika tidak, buat folder
    if (!is_dir($targetDir)) {
      mkdir($targetDir, 0755, true);
    }

    $imageName = basename($_FILES["foto"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Validasi file gambar
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    if (in_array($imageFileType, $allowedTypes)) {
      // Pindahkan file ke folder target
      if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {
        $foto = $targetFilePath;  // Update nilai $foto
      } else {
        echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah file.'); window.location.href='about_tambah.php';</script>";
        die;  // Hentikan eksekusi script jika gagal upload file
      }
    } else {
      echo "<script>alert('Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location.href='about_tambah.php';</script>";
      die;  // Hentikan eksekusi script jika tipe file tidak valid
    }
  }

  // Pastikan foto sudah terisi sebelum melakukan query
  if ($foto) {
    $sql = "INSERT INTO about_me (nama, foto, konten, aktif) 
            VALUES ('$nama', '$foto', '$konten', 1)";
  } else {
    $sql = "INSERT INTO about_me (nama, foto, konten, aktif) 
            VALUES ('$nama', '', '$konten', 1)";
  }

  if ($conn->query($sql) === TRUE) {
    // Pastikan hanya satu yang aktif
    $sql = "UPDATE about_me SET aktif = 0 WHERE id != " . $conn->insert_id;
    $conn->query($sql);
    echo "<script>alert('Data berhasil disimpan !'); window.location.href='about.php';</script>";
  } else {
    echo "<script>alert('Gagal menyimpan data: " . $conn->error . "'); window.location.href='about_tambah.php';</script>";
  }
}
?>
<?php require_once('footer.php'); ?>
