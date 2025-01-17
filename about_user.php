<?php
require_once('config/koneksi.php');  // Menghubungkan ke database

// Query untuk mengambil data "About Me" yang aktif
$query_about_me = mysqli_query($conn, "SELECT * FROM about_me WHERE aktif = 1 ORDER BY id DESC");
$about_me = mysqli_fetch_array($query_about_me);

// Menutup koneksi database
mysqli_close($conn);
?>

<section class="about" style="background: url('assets/img/wallpaper.jpg') no-repeat center center; background-size: cover;">
    <div class="about-content">
        <!-- Panggil data About Me -->
        <?php
        if ($about_me != null) { ?>
            <h3><?= htmlspecialchars($about_me['foto']) ?></h3>
            <p><?= nl2br(htmlspecialchars($about_me['konten'])) ?></p>
            <h2>Saya adalah seorang <span class="text"></span></h2>
            <script>
                var typed = new Typed(".text", {
                    strings: <?= json_encode(explode(';', $about_me['tentang_saya'])) ?>,
                    typeSpeed: 100,
                    backSpeed: 100,
                    backDelay: 1000,
                    loop: true
                });
            </script>

            <!-- Menampilkan Foto -->
            <?php if ($about_me['foto'] != null) { ?>
                <img src="uploads/<?= htmlspecialchars($about_me['foto']) ?>" alt="Foto" class="about-photo" style="width: 200px; height: auto; border-radius: 50%; margin-top: 20px;">
            <?php } ?>

            <div class="about-sci">
                <?php
                // Query untuk mengambil data sosial media
                $query_about_social_media = mysqli_query($conn, "SELECT * FROM home_sosial_media");
                $about_social_media = mysqli_fetch_all($query_about_social_media, MYSQLI_ASSOC);
                foreach ($about_social_media as $social_media) { ?>
                    <a href="<?= $social_media['link'] ?>" style="--i:7"><i class='bx <?= $social_media['bx_logo'] ?>'></i></a>
                <?php }
                ?>
            </div>
        <?php } else { ?>
            <p class="text-center">Tidak ada data tentang saya yang tersedia.</p>
        <?php } ?>
    </div>
</section>

<?php require_once('footer.php'); ?>
