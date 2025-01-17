 <?php
$menu_aktif = "home";
$judul_halaman = "Pengaturan - Home";
require_once('header.php'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan</span> <a href="home.php">Home</a></h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <a href="home_tambah.php" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i> Tambah</a>
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
                <?php $query = mysqli_query($conn, "SELECT * FROM home ORDER BY id DESC");
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($result as $key => $home) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $home['judul'] ?></td>
                    <td class="text-center">
                      <?php if ($home['aktif'] == 1) { ?>
                        <span class="badge bg-success">Aktif</span>
                      <?php } else { ?>
                        <span class="badge bg-danger">Tidak Aktif</span>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php if ($home['aktif'] == 0) { ?>
                        <a href="home_aktif.php?id=<?= $home['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Mengaktifkan Data Ini ?')" class="btn btn-success btn-xs"><i class="bx bx-check"></i></a>
                      <?php } ?>
                      <a href="home_edit.php?id=<?= $home['id'] ?>" class="btn btn-warning btn-xs"><i class="bx bx-edit"></i></a>
                      <a href="home_hapus.php?id=<?= $home['id'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')"><i class="bx bx-trash"></i></a>
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