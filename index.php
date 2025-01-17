<?php
include 'config/koneksi.php';

// Set Pengunjung Per Klik
$sql = $conn->query("INSERT INTO pengunjung_per_hari (tanggal, total_pengunjung, last_updated)
    VALUES (CURDATE(), 1, NOW()) ON DUPLICATE KEY UPDATE total_pengunjung = total_pengunjung + 1, last_updated = NOW()");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
</head>

<body>
    <header class="header">
        <a href="#" class="logo">portofolio</a>
        <nav class="navbar">
            <a href="#" style="--i:1" class="active">Home</a>
            <a href="#about" style="--i:2">About</a>
            <a href="#skills" style="--i:3">Skills</a>
            <a href="#services" style="--i:4">Layanan</a>
            <a href="#berita" style="--i:4">Berita</a>
            <a href="#contact" style="--i:5">Contact</a>
        </nav>
    </header>

    <?php
    $query_home = mysqli_query($conn, "SELECT * FROM home WHERE aktif=1");
    $home = mysqli_fetch_array($query_home);
    $background = 'assets/img/wallpaper.jpg';
    if ($home['gambar_latar_belakang'] != null) {
        $background = 'admin/' . $home['gambar_latar_belakang'];
    }
    ?>
    <section class="home" style="background: url('<?= $background ?>') no-repeat center center;">
        <div class="home-content">
            <?php
            if ($home != null) { ?>
                <h3><?= $home['judul'] ?></h3>
                <?= $home['konten'] ?>
                <h2>Saya adalah seorang <span class="text"></span></h2>
                <script>
                    var typed = new Typed(".text", {
                        strings: <?= json_encode(explode(';', $home['tentang_saya'])) ?>,
                        typeSpeed: 100,
                        backSpeed: 100,
                        backDelay: 1000,
                        loop: true
                    });
                </script>
                <div class="home-sci">
                    <?php
                    $query_home_social_media = mysqli_query($conn, "SELECT * FROM home_sosial_media");
                    $home_social_media = mysqli_fetch_all($query_home_social_media, MYSQLI_ASSOC);
                    foreach ($home_social_media as $social_media) { ?>
                        <a href="<?= $social_media['link'] ?>" style="--i:7"><i class='bx <?= $social_media['bx_logo'] ?>'></i></a>
                    <?php }
                    ?>
                </div>
            <?php }
            ?>
            <a href="#contact" class="btn-box">More About Me</a>
        </div>
        <span class="home-imgHover"></span>
    </section>

    <?php
    // Ambil data 'about_me' dari database
    $query_about_me = mysqli_query($conn, "SELECT * FROM about_me WHERE aktif=1");
    $about_me_data = mysqli_fetch_array($query_about_me);  // Simpan hasil query dalam variabel baru
    $foto = 'assets/img/wallpaper.jpg'; // Nilai default foto
    if ($about_me_data && $about_me_data['foto'] != null) {
        $foto = 'admin/' . $about_me_data['foto']; // Jika ada foto di database
    }
    ?>
    
    <section class="about" id="about">
        <div class="about-container">
            <!-- Kotak Gambar -->
            <img src="<?= $foto ?>" alt="About Me Image" width="400px" style="border-radius: 50px;">
        </div>
        <!-- Kotak Teks -->
        <div class="about-text">
            <?php if ($about_me_data): ?>
                <style>
                    p {
                        margin-bottom: 0;
                    }
                </style>
                <h2><?= $about_me_data['nama'] ?></h2>
                <?= nl2br($about_me_data['konten']) ?>
            <?php endif; ?>
            <div class="home-sci">
                <?php
                $query_home_social_media = mysqli_query($conn, "SELECT * FROM home_sosial_media");
                $home_social_media = mysqli_fetch_all($query_home_social_media, MYSQLI_ASSOC);
                foreach ($home_social_media as $social_media) { ?>
                    <a href="<?= $social_media['link'] ?>" style="--i:7"><i class='bx <?= $social_media['bx_logo'] ?>'></i></a>
                <?php }
                ?>
            </div>
            <div class="about-text">
                <a href="#contact" class="btn-box">More About Me</a>
            </div>
        </div>
    </section>

    <!-- CSS untuk Flexbox dan responsif -->
    <style>
        /* Pastikan container utama adalah flexbox */
        .about-container {
            display: flex;
            justify-content: center;
            /* Memastikan konten sejajar di tengah secara horizontal */
            align-items: center;
            /* Memastikan konten sejajar di tengah secara vertikal */
            gap: 40px;
            /* Memberikan jarak antara gambar dan teks */
            flex-wrap: wrap;
            /* Agar elemen-elemen di dalamnya bisa berpindah baris jika layar sempit */
            text-align: center;
            /* Agar teks di dalam kotak teks tetap terpusat */
            height: 100vh;
            /* Memastikan konten berada di tengah halaman secara vertikal */
        }

        /* Menyesuaikan gambar agar responsif dan tidak terdistorsi */
        .about-img-box img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            /* Opsional, jika ingin border round pada gambar */
        }

        /* Menjaga ukuran dan layout kotak teks */
        .about-info-box {
            max-width: 600px;
            /* Menyediakan batasan lebar untuk kotak teks */
            text-align: left;
            /* Menjaga agar teks di dalam kotak teks tetap rata kiri */
        }

        /* Mengatur tombol "More About Me" agar tetap terpisah dengan teks */
        .about-text {
            margin-top: 20px;
        }

        /* Pastikan tampilannya responsif di layar kecil */
        @media (max-width: 768px) {
            .about-container {
                flex-direction: column;
                /* Menyusun elemen secara vertikal pada layar kecil */
                height: auto;
                /* Hapus tinggi 100vh pada layar kecil */
                text-align: center;
                /* Memastikan teks berada di tengah pada layar kecil */
            }

            .about-img-box {
                margin-bottom: 20px;
                /* Memberikan jarak antara gambar dan teks */
            }
        }
    </style>

    <!-- Skills Section -->
    <h1 class="sub-title">My <span>Skills</span></h1>
    <section>
        <div class="container1" id="skills">
            <h1 class="heading1">Technical Skills</h1>
            <div class="Technical-bars">
                <!-- Bars for skills -->
                <div class="bar"><i style="color: #c95d2e" class='bx bxl-html5'></i>
                    <div class="info">
                        <span>HTML</span>
                    </div>
                    <div class="progress-line html">
                        <span></span>
                    </div>
                </div>
                <div class="bar"><i style="color: #147bbc" class='bx bxl-css3'></i>
                    <div class="info">
                        <span>CSS</span>
                    </div>
                    <div class="progress-line css">
                        <span></span>
                    </div>
                </div>
                <div class="bar"><i style="color: #b0bc1e" class='bx bxl-javascript'></i>
                    <div class="info">
                        <span>Javascript</span>
                    </div>
                    <div class="progress-line javascript">
                        <span style="width: 88% !important;"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="contact-text">
            <h2>Contact <span>Me</span></h2>
            <h4>Lets work together</h4>
            <p>I'm glad you've visited my personal portfolio website! If you have any questions, suggestions, or would like to collaborate, please feel free to contact me through this form. I will endeavor to reply to your message as soon as possible.</p>
            <ul class="contact-list">
                <li><i class="bx bxs-send"></i> Riski Kurniawan@gmail.com</li>
                <li><i class="bx bxs-phone"></i> 081809208710</li>
            </ul>
            <div class="contact-icons">
                <a href="https://www.instagram.com/rsqkrnwn?igsh=cnNna2lzb3k4Y2wy"><i class="bx bxl-instagram"></i></a>
                <a href="https://wa.me/+6281809208710"><i class="bx bxl-whatsapp"></i></a>
                <a href="https://www.tiktok.com/@banana251106?_t=8pxkdvACDGK&_r=1"><i class="bx bxl-tiktok"></i></a>
                <a href="https://www.linkedin.com/in/riski-kurniawan-01966232a?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BYk4%2BioJgT2WAz9MgLwlulQ%3D%3D"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

        <div class="contact-form">
            <form action="">
                <input type="text" placeholder="Enter Your Name" required>
                <input type="email" placeholder="Enter Your Email" required>
                <input type="text" placeholder="Enter Your Subject">
                <textarea placeholder="Enter Your Message" required></textarea>
                <input type="submit" value="Submit" class="send">
            </form>
        </div>
    </section>

    <div class="last-text">
        <p>developed with TENOSI TEAM</p>
    </div>
    <a href="#" class="top"><i class='bx bx-up-arrow-alt'></i></a>
</body>

</html>