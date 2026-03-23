<?php
// Pastikan tidak ada spasi atau baris kosong di atas tag <?php ini

// 1. Hubungkan ke database
include '../controllers/koneksi.php';

// 2. Cek apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // --- TAMBAHAN LOGIKA RECAPTCHA ---
    $secretKey = "6LfMY5QsAAAAAHw0StDFc0We0-jqJ54KNSk-XTOz"; // Ganti dengan Secret Key dari Google
    $captcha   = $_POST['g-recaptcha-response'];

    // Verifikasi ke server Google
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $captcha);
    $responseData   = json_decode($verifyResponse);

    // Jika Captcha TIDAK valid atau TIDAK dicentang
    if (!$responseData->success) {
        header("Location: ../../testimoni.php?status=captcha_gagal");
        exit();
    }
    // ---------------------------------

    // 3. Ambil data dan bersihkan (Sanitization)
    $nama  = mysqli_real_escape_string($conn, trim($_POST['nama_user']));
    $pesan = mysqli_real_escape_string($conn, trim($_POST['pesan_user']));

    // 4. Validasi: Pastikan input tidak hanya berisi spasi kosong
    if (!empty($nama) && !empty($pesan)) {
        
        // 5. Gunakan Query untuk memasukkan data
        $sql = "INSERT INTO testimoni (nama, pesan) VALUES ('$nama', '$pesan')";

        if (mysqli_query($conn, $sql)) {
            // Jika berhasil, kirim status sukses ke URL
            header("Location: ../../testimoni.php?status=sukses");
            exit(); 
        } else {
            // Jika query gagal
            die("Gagal menyimpan data: " . mysqli_error($conn));
        }

    } else {
        // Jika ada field yang kosong
        header("Location: ../../testimoni.php?status=kosong");
        exit();
    }

} else {
    // Jika mencoba akses file ini secara langsung tanpa POST
    header("Location: ../../testimoni.php");
    exit();
}

// Menutup koneksi
mysqli_close($conn);
?>