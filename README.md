# Portal TPU Suka Mulya

Portal ini memakai PHP CodeIgniter 3 dan MySQL/MariaDB. Nama tabel dan kolom dibuat dalam bahasa Indonesia. Ada halaman publik, akun warga, dan panel admin.

## Menjalankan di XAMPP

1. Jalankan Apache dan MySQL.
2. Impor `database/skema.sql` melalui phpMyAdmin atau `mysql -u root -e "source C:/xampp/htdocs/TPU-SUKAMULYA/database/skema.sql"`.
3. Sesuaikan koneksi di `application/config/database.php`, atau gunakan variabel `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`.
4. Buat admin dari terminal: `C:\xampp\php\php.exe buat_admin.php admin@contoh.id "Admin TPU"`. Simpan kata sandi awal yang ditampilkan. Untuk instalasi lama, jalankan `database/migrasi_username_admin.sql`, `database/migrasi_iuran.sql`, `database/migrasi_perawatan.sql`, `database/migrasi_gambar.sql`, dan `database/migrasi_demo.sql` satu kali.
5. Buka `http://localhost/TPU-SUKAMULYA/`.

## Cakupan yang sudah berfungsi

- Publik: beranda, statistik petak, pencarian makam terverifikasi, ringkasan kas operasional, pengumuman, kontak.
- Warga: daftar/login, dashboard, pengajuan layanan, pengaduan, makam keluarga yang terhubung, tagihan dan riwayat pembayaran milik sendiri, serta pengiriman referensi pembayaran untuk diverifikasi.
- Admin: dashboard sesuai acuan visual dengan grafik dan statistik dari database, edit teks/gambar landing page, blok/baris/petak, makam, data warga, pengajuan, pengumuman, jadwal perawatan, jenis iuran, kepesertaan, penerbitan tagihan rutin, dan verifikasi pembayaran.
- Iuran: tagihan per peserta/periode dibuat idempoten; donasi sukarela tidak diterbitkan sebagai utang; pembayaran terverifikasi memperbarui status tagihan dan kas dalam satu transaksi.
- Keamanan dasar: hash kata sandi, CSRF, output escaping, pembatasan akses, transaksi dan penguncian petak saat mencatat makam, audit perubahan utama.

## Data presentasi

Instalasi lokal ini sudah diisi data contoh: 4 blok dengan foto ilustrasi, 240 petak, 156 makam, 6 akun warga, pengajuan, iuran, pembayaran, kas, perawatan, dan pengumuman. Semua data ini diberi penanda **MODE PRESENTASI**. Foto yang dipakai berasal dari gambar acuan desain, bukan foto tiap makam fisik.

- Akun warga demo: `warga1@demo.tpu.local` sampai `warga6@demo.tpu.local`, kata sandi `warga123`.
- Melihat foto dan status petak: `/blok-makam` atau menu **Admin → Blok & Petak**.
- Pengisian ulang yang aman: `C:\xampp\php\php.exe database\isi_data_demo.php` (tidak menggandakan data).
- Menghapus data contoh setelah presentasi: `C:\xampp\php\php.exe database\hapus_data_demo.php`. Skrip akan menolak penghapusan jika catatan baru bergantung pada data contoh.

## Batasan saat ini

Proses bisnis pada dokumen sumber jauh lebih luas dari implementasi ini. Konfirmasi otomatis dari bank/payment gateway, unggah dan pemeriksaan dokumen privat, reservasi petak, persetujuan otoritas, pemakaman tumpang, pemindahan makam, santunan dana sosial, inventaris, rekonsiliasi, dan ekspor belum diaktifkan. Nominal dan kewenangan iuran wajib ditetapkan sesuai aturan pengelola sebelum dipakai pada warga nyata. Jangan gunakan instalasi ini untuk izin pemakaman atau penagihan resmi sebelum aturan setempat dan otoritasnya ditetapkan.

Gambar contoh dari pengguna dipakai sebagai aset visual awal. Ubah teks landing page melalui menu **Admin → Tampilan Beranda**.
