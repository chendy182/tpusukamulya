<?php
// Jalankan hanya dari terminal: php buat_admin.php email@contoh.id "Nama Admin"
if (PHP_SAPI !== 'cli') { http_response_code(403); exit('Akses ditolak'); }
if ($argc < 3) { fwrite(STDERR, "Pemakaian: php buat_admin.php email nama\n"); exit(1); }
$email=strtolower(trim($argv[1])); $nama=trim($argv[2]);
$namaPengguna=strtolower(trim($argv[3] ?? strtok($email,'@')));
if (!filter_var($email,FILTER_VALIDATE_EMAIL) || $nama==='') { fwrite(STDERR,"Email atau nama tidak valid.\n"); exit(1); }
if (!preg_match('/^[a-z0-9_.-]{3,80}$/',$namaPengguna)) { fwrite(STDERR,"Username tidak valid.\n"); exit(1); }
$mysqli=new mysqli(getenv('DB_HOST') ?: 'localhost',getenv('DB_USER') ?: 'root',getenv('DB_PASS') ?: '',getenv('DB_NAME') ?: 'tpu_suka_mulya');
if ($mysqli->connect_errno) { fwrite(STDERR,"Koneksi database gagal.\n"); exit(1); }
$cek=$mysqli->prepare('SELECT id FROM pengguna WHERE email=? OR nama_pengguna=?'); $cek->bind_param('ss',$email,$namaPengguna); $cek->execute();
if ($cek->get_result()->fetch_assoc()) { fwrite(STDERR,"Email atau username sudah terdaftar.\n"); exit(1); }
$password=bin2hex(random_bytes(12)); $hash=password_hash($password,PASSWORD_DEFAULT);
$stmt=$mysqli->prepare("INSERT INTO pengguna (nama,nama_pengguna,email,kata_sandi,peran) VALUES (?,?,?,?,'admin')");
$stmt->bind_param('ssss',$nama,$namaPengguna,$email,$hash); $stmt->execute();
echo "Admin dibuat. Username: {$namaPengguna}\nEmail: {$email}\nKata sandi awal: {$password}\nSegera simpan dan ganti kata sandi melalui prosedur admin.\n";
