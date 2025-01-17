<?php
$menu_aktif = "about";
$judul_halaman = "Pengaturan - About";
require_once('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan</span> <a href="about.php">About me</a></h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <a href="about_tambah.php" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> Tambah About me</a>
        </div>
        <div class="card-body">
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <th style="width: 5%;">No.</th>
                <th>Judul</th>
                <th class="text-center" style="width: 5%;">Aktif</th>
                <th class="text-center" style="width: 15%;">Aksi</th>
              </thead>
              <tbody>
                <?php $query = mysqli_query($conn, "SELECT * FROM about_me ORDER BY id DESC");
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($result as $key => $about_me) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $about_me['nama'] ?></td>
                    <td class="text-center">
                      <?php if ($about_me['aktif'] == 1) { ?>
                        <span class="badge bg-success">Aktif</span>
                      <?php } else { ?>
                        <span class="badge bg-danger">Tidak Aktif</span>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php if ($about_me['aktif'] == 0) { ?>
                        <a href="about_aktif.php?id=<?= $about_me['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengaktifkan Data Ini ?')" class="btn btn-success btn-xs"><i class="bx bx-check"></i></a>
                      <?php } ?>
                      <a href="about_edit.php?id=<?= $about_me['id'] ?>" class="btn btn-warning btn-xs"><i class="bx bx-edit"></i></a>
                      <a href="about_hapus.php?id=<?= $about_me['id'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')"><i class="bx bx-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('footer.php'); ?>