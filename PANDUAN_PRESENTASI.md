# Alur presentasi TPU Suka Mulya

Semua angka, nama, foto blok, nominal iuran, dan transaksi yang tampil saat ini adalah **data contoh**. Foto blok diambil dari mockup yang diberikan dan bukan dokumentasi petak fisik.

1. Buka `http://localhost/TPU-SUKAMULYA/` untuk memperlihatkan landing page, statistik, berita, dan ringkasan keuangan.
2. Pilih **Blok Makam** untuk melihat foto ilustrasi Blok A–D dan peta warna 240 petak. Hijau tua = terisi; hijau muda = tersedia.
3. Pilih **Cari Makam**, cari `Ahmad` atau pilih Blok A. Hasil memuat foto ilustrasi, baris, petak, dan label **Data contoh**.
4. Buka `http://localhost/TPU-SUKAMULYA/admin`. Masuk dengan akun admin yang telah dibuat. Dashboard menampilkan data contoh dari database, termasuk grafik pemakaman dan okupansi blok.
5. Di admin, lihat **Tagihan Iuran** dan **Pembayaran**. Jenis iuran, peserta, periode, serta pembayaran yang menunggu verifikasi sudah tersedia sebagai contoh.
6. Untuk menampilkan sisi warga, masuk sebagai `warga1@demo.tpu.local` dengan kata sandi `warga123`. Buka menu **Iuran & Pembayaran** untuk melihat tagihan miliknya.

Untuk menghapus data contoh setelah presentasi, jalankan `C:\xampp\php\php.exe database\hapus_data_demo.php` dari folder proyek. Skrip tersebut sudah diuji pada database sementara dan menolak penghapusan bila ada data baru yang masih bergantung pada data demo.
