<?php
$menu_aktif = "home";
$judul_halaman = "Tambah Data Home";
require_once('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan/</span> <a href="home.php">Home</a>/<a href="home_tambah.php">Tambah Data Home</a></h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <a href="home.php" class="btn btn-warning btn-sm"><i class="bx bx-back"></i> Kembali</a>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="judul">Judul *</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Halo, Selamat Datang" required />
              </div>
              <div class="mb-3">
                <label class="form-label" for="tentang_saya">Konten *</label>
                <textarea name="konten" id="konten" class="tinymce"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="tentang_saya">Tentang Saya *</label>
                <input type="text" class="form-control" id="tentang_saya" name="tentang_saya" placeholder="Web Developer;UI/UX" required />
                <i>(Pisahkan dengan tanda ; jika lebih dari satu)</i>
              </div>
              <div class="mb-3">
                <label class="form-label" for="gambar_latar_belakang">Gambar Latar Belakang</label>
                <input type="file" class="form-control" id="gambar_latar_belakang" name="gambar_latar_belakang" accept="image/*" />
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
  $judul = $conn->real_escape_string($_POST['judul']);
  $konten = $conn->real_escape_string($_POST['konten']);
  $tentang_saya = $conn->real_escape_string($_POST['tentang_saya']);
  $gambar_latar_belakang = null;

  if (isset($_FILES['gambar_latar_belakang'])) {
    $targetDir = "assets/uploads/";
    // Cek apakah folder target ada, jika tidak, buat folder
    if (!is_dir($targetDir)) {
      mkdir($targetDir, 0755, true);
    }

    $imageName = basename($_FILES["gambar_latar_belakang"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Validasi file gambar
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    if (in_array($imageFileType, $allowedTypes)) {
      // Pindahkan file ke folder target
      if (move_uploaded_file($_FILES["gambar_latar_belakang"]["tmp_name"], $targetFilePath)) {
        $gambar_latar_belakang = $targetFilePath;
      } else {
        $error = $_FILES['gambar_latar_belakang']['error'];
        echo $error;
        die;
        echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah file.'); window.location.href='home_tambah.php';</script>";
      }
    } else {
      echo "<script>alert('Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location.href='home_tambah.php';</script>";
    }
  }

  $sql = "INSERT INTO home (judul, konten, tentang_saya,aktif, gambar_latar_belakang) 
            VALUES ('$judul', '$konten', '$tentang_saya',1, '$gambar_latar_belakang')";

  if ($conn->query($sql) === TRUE) {
    $sql = "UPDATE home SET aktif = 0 WHERE id != " . $conn->insert_id;
    $conn->query($sql);
    echo "<script>alert('Data berhasil disimpan !'); window.location.href='home.php';</script>";
  } else {
    echo "<script>alert('Gagal menyimpan data: " . $conn->error . "');</script> window.location.href='home_tambah.php';</script>";
  }
}
?>
<?php require_once('footer.php'); ?>