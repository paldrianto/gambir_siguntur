<?php 
// 1. Menghubungkan ke database
include 'backend/controllers/koneksi.php';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Testimoni - Gambir Asli</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Merriweather:wght@700&display=swap" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <span class="brand-text">GAMBIR ASLI</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.html">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link active" href="testimoni.php">Testimoni</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-light py-5">
        <div class="container text-center">
            <h1>Testimoni Pengguna</h1>
            <p>Berbagi pengalaman nyata Anda bersama produk Gambir Asli.</p>
        </div>
    </header>

    <section class="container py-5">
        <h2 class="text-center mb-5">Apa Kata Mereka?</h2>
        <div class="row g-4" id="containerTestimoni">
            <?php 
            $query = "SELECT * FROM testimoni ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $inisial = strtoupper(substr($row['nama'], 0, 1));
                    ?>
                    <div class="col-md-4">
                        <div class="testimonial-card p-3 border rounded shadow-sm h-100">
                            <div class="d-flex align-items-center mb-3">
                                <div class="initial-circle me-3"><?php echo $inisial; ?></div>
                                <h5 class="mb-0"><?php echo htmlspecialchars($row['nama']); ?></h5>
                            </div>
                            <div class="testimonial-content">
                                <p class="text-muted italic">"<?php echo htmlspecialchars($row['pesan']); ?>."</p>
                            </div>
                        </div>
                    </div>
                    <?php 
                } 
            } else { 
                echo '<div class="col-12 text-center text-muted"><p>Belum ada testimoni. Jadilah yang pertama!</p></div>';
            } 
            ?>
        </div>
    </section>

    <section class="container py-5 border-top">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card p-4 shadow-sm">
                    <h2 class="h4 mb-4">Tulis Testimoni Anda</h2>

                    <?php if(isset($_GET['status'])): ?>
                        <?php if($_GET['status'] == 'sukses'): ?>
                            <div class="alert alert-success">Terima kasih! Testimoni Anda telah berhasil dikirim.</div>
                        <?php elseif($_GET['status'] == 'kosong'): ?>
                            <div class="alert alert-warning">Mohon isi nama dan pesan Anda terlebih dahulu.</div>
                        <?php elseif($_GET['status'] == 'captcha_gagal'): ?>
                            <div class="alert alert-danger">Validasi reCAPTCHA gagal. Silakan coba lagi.</div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <form action="backend/confiq/proses_testimoni.php" method="POST" id="formKomentar">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_user" class="form-control" placeholder="Masukkan nama Anda" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan / Pengalaman</label>
                            <textarea name="pesan_user" class="form-control" rows="4" placeholder="Ceritakan pengalaman Anda menggunakan Gambir Asli..." required></textarea>
                        </div>
                        
                        <div class="g-recaptcha mb-3" data-sitekey="6LfMY5QsAAAAAEjGraSLwN2C2q5FPDlopmYId_l2"></div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            Kirim Testimoni
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 bg-dark text-white mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 <strong>Gambir Asli</strong>. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi Frontend untuk reCAPTCHA
        document.getElementById("formKomentar").addEventListener("submit", function(e) {
            const response = grecaptcha.getResponse();
            if (response.length === 0) {
                e.preventDefault(); // Mencegah form terkirim
                alert("Silakan centang reCAPTCHA terlebih dahulu!");
            }
        });
    </script>
</body>
</html>