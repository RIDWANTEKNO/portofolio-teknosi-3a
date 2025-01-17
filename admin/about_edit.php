<?php
$menu_aktif = "about";
$judul_halaman = "Edit Data About";
require_once('header.php');

// Cek jika ada ID di URL untuk edit
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM about_me WHERE id = $id");
  $home = mysqli_fetch_assoc($query);

  // Jika data tidak ditemukan, redirect ke halaman about.php
  if ($home == null) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='about.php';</script>";
    exit;  // Pastikan script berhenti jika data tidak ditemukan
  }
} else {
  echo "<script>alert('ID tidak ditemukan!'); window.location.href='about.php';</script>";
  exit;  // Jika tidak ada ID, redirect
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Pengaturan/</span> 
    <a href="about.php">About</a>/<a href="about_edit.php?id=<?= $home['id'] ?>">Edit Data About</a>
  </h4>
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
                <input type="text" class="form-control" id="nama" name="nama" 
                  value="<?= $home['nama'] ?>" placeholder="Silahkan masukkan nama anda" required />
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="foto">Pilih Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" />
                <?php if (!empty($home['foto'])): ?>
                  <img src="<?= $home['foto'] ?>" alt="Foto" class="img-thumbnail" style="max-width: 150px; margin-top: 10px;">
                <?php endif; ?>
              </div>

              <div class="mb-3">
                <label class="form-label" for="konten">Tentang saya *</label>
                <textarea name="konten" id="konten" class="tinymce"><?= $home['konten'] ?></textarea>
              </div>

              <hr class="mt-5">
              <div class="row justify-content-center">
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" style="width: 100%;">Perbarui Data</button>
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

  // Menangani upload foto jika ada
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
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
        echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah file.'); window.location.href='about_edit.php?id=$id';</script>";
        die;  // Hentikan eksekusi script jika gagal upload file
      }
    } else {
      echo "<script>alert('Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location.href='about_edit.php?id=$id';</script>";
      die;  // Hentikan eksekusi script jika tipe file tidak valid
    }
  } else {
    // Jika tidak ada foto baru yang di-upload, gunakan foto lama jika ada
    if (!empty($home['foto'])) {
      $foto = $home['foto'];
    }
  }

  // Update data jika ada
  $sql = "UPDATE about_me SET nama = '$nama', foto = '$foto', konten = '$konten' WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='about.php';</script>";
  } else {
    echo "<script>alert('Gagal memperbarui data: " . $conn->error . "'); window.location.href='about_edit.php?id=$id';</script>";
  }
}
?>
<?php require_once('footer.php'); ?>
