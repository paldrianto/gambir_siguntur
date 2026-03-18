<?php
// Pastikan tidak ada spasi atau baris kosong di atas tag <?php ini

// 1. Hubungkan ke database
include '../controllers/koneksi.php';

// 2. Cek apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 3. Ambil data dan bersihkan dari karakter berbahaya (Sanitization)
    // Menggunakan trim() untuk menghapus spasi di awal/akhir input
    $nama  = mysqli_real_escape_string($conn, trim($_POST['nama_user']));
    $pesan = mysqli_real_escape_string($conn, trim($_POST['pesan_user']));

    // 4. Validasi: Pastikan input tidak hanya berisi spasi kosong
    if (!empty($nama) && !empty($pesan)) {
        
        // 5. Gunakan Query untuk memasukkan data
        $sql = "INSERT INTO testimoni (nama, pesan) VALUES ('$nama', '$pesan')";

        if (mysqli_query($conn, $sql)) {
            // Jika berhasil, kirim status sukses ke URL
            header("Location: ../../testimoni.php?status=sukses");
            exit(); // Selalu gunakan exit setelah header redirect
        } else {
            // Jika query gagal, tampilkan error (untuk debugging)
            die("Gagal menyimpan data: " . mysqli_error($conn));
        }

    } else {
        // Jika ada field yang kosong atau hanya berisi spasi
        header("Location: testimoni.php?status=kosong");
        exit();
    }

} else {
    // Jika mencoba akses file ini secara langsung tanpa POST
    header("Location: testimoni.php");
    exit();
}

// Menutup koneksi
mysqli_close($conn);
?>