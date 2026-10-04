<?php
$error = "";
$sukses = false;
$nama = "";
$whatsapp = "";
$email = "";
$matkul = "";
$motivasi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama'] ?? '');
    $whatsapp = trim($_POST['whatsapp'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $matkul = trim($_POST['matkul'] ?? '');
    $motivasi = trim($_POST['motivasi'] ?? '');

    // 1. Validasi Kolom Kosong
    if (empty($nama) || empty($whatsapp) || empty($email) || empty($matkul) || empty($motivasi)) {
        $error = "Pendaftaran gagal! Harap isi semua kolom yang kosong.";
    } 
    // 2. Validasi Nama (Harus berupa huruf dan spasi)
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error = "Pendaftaran gagal! Nama lengkap hanya boleh berisi huruf.";
    }
    // 3. Validasi Nomor WhatsApp (Harus diawali angka '0' atau '62')
    elseif (!preg_match("/^(0|62)[0-9]{8,13}$/", $whatsapp)) {
        $error = "Pendaftaran gagal! Nomor WhatsApp harus diawali angka '0' atau '62' dan valid.";
    } 
    // 4. Validasi Format Email Institusi
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Pendaftaran gagal! Format email institusi tidak valid.";
    } 
    else {
        // Jika seluruh validasi lolos
        $sukses = true;
    }
}?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Asisten Praktikum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <?php if (!$sukses): ?>
            <!-- Form Pendaftaran -->
            <div class="header-title">
                <h2>Pendaftaran Asisten Praktikum</h2>
                <p>Laboratorium Enterprise Application Development</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo htmlspecialchars($nama);
                     ?>" placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label for="whatsapp">Nomor WhatsApp *</label>
                    <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="<?php echo htmlspecialchars($whatsapp);
                     ?>" placeholder="Contoh: 0812... atau 62812...">
                </div>

                <div class="form-group">
                    <label for="email">Email Institusi *</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email);
                     ?>" placeholder="nama@student.telkomuniversity.ac.id">
                </div>

                <div class="form-group">
                    <label for="matkul">Pilihan Mata Kuliah Praktikum *</label>
                    <select id="matkul" name="matkul" class="form-control">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <option value="Pemrograman Aplikasi Website" <?php if($matkul == "Pemrograman Aplikasi Website") echo "selected"; ?>>Pemrograman Aplikasi Website</option>
                        <option value="Enterprise Application Development" <?php if($matkul == "Enterprise Application Development") echo "selected"; ?>>Enterprise Application Development</option>
                        <option value="Pemrograman Berorientasi Object" <?php if($matkul == "Pemrograman Berorientasi Object") echo "selected"; ?>>Pemrograman Berorientasi Object</option>
                        <option value="Sistem Basis Data" <?php if($matkul == "Sistem Basis Data") echo "selected"; ?>>Sistem Basis Data</option>
                        <option value="Jaringan Komputer" <?php if($matkul == "Jaringan Komputer") echo "selected"; ?>>Jaringan Komputer</option>
                        <option value="Pengantar Sistem Informasi" <?php if($matkul == "Pengantar Sistem Informasi") echo "selected"; ?>>Pengantar Sistem Informasi</option>
                        <option value="Algoritma dan Pemrograman"<?php if ($matkul == "Algoritma dan Pemrograman") echo "selected"; ?>>Algoritma dan Pemrograman</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="motivasi">Motivasi Mendaftar *</label>
                    <textarea id="motivasi" name="motivasi" class="form-control" placeholder="Tuliskan motivasi Anda..."><?php echo htmlspecialchars($motivasi); ?></textarea>
                </div>

                <button type="submit" class="btn-submit">Daftar Sekarang</button>
            </form>

        <?php else: ?>
            <!-- Kartu Registrasi -->
            <div class="card-registrasi">
                <div class="card-title">Kartu Registrasi</div>
                <div class="card-item"><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($nama); ?></div>
                <div class="card-item"><strong>Nomor WhatsApp:</strong> <?php echo htmlspecialchars($whatsapp); ?></div>
                <div class="card-item"><strong>Email Institusi:</strong> <?php echo htmlspecialchars($email); ?></div>
                <div class="card-item"><strong>Mata Kuliah:</strong> <?php echo htmlspecialchars($matkul); ?></div>
                <div class="card-item"><strong>Motivasi:</strong> <?php echo htmlspecialchars($motivasi); ?></div>

                <a href="" class="btn-secondary">Lihat Data Pendaftar</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>