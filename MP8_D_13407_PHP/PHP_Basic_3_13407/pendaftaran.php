<h2>Pendaftaran Akun</h2>
<form method="POST" action="">
    <p>Nama : <br /><input type="text" name="nama" /></p>
    <p>Telepon : <br /><input type="text" name="telepon" /></p>
    <p>Verifikasi : <br />
        <select name="verifikasi">
            <option value="">-- Pilih --</option>
            <option value="WhatsApp">WhatsApp</option>
            <option value="SMS">SMS</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $tlp = $_POST['telepon'] ?? '';
    $verifikasi = $_POST['verifikasi'] ?? '';
    $error = array();
    $lokasi = "";

    if (empty($nama) || empty($tlp) || empty($verifikasi)) {
        $error[] = "Harap lengkapi semua data.";
    }

    if (!empty($nama) && !preg_match("/^[a-zA-Z ]+$/", $nama)) {
        $error[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (!empty($tlp) && !preg_match("/^(\+62|08)[0-9]{9,11}$/", $tlp)) {
        $error[] = "Telepon harus diawali +62 atau 08, hanya angka, dan 9 sampai 11 digit setelahnya.";
    }

    if ($verifikasi == "WhatsApp") {
        $lokasi = "WhatsApp";
    } elseif ($verifikasi == "SMS") {
        $lokasi = "SMS";
    }

    if (!empty($error)) {
        foreach ($error as $pesan) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($pesan) . " !!</p>";
        }
    } else {
        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p><strong>Nama: </strong>" . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>Telepon: </strong>" . htmlspecialchars($tlp) . "</p>";
        echo "<p><strong>Verifikasi kode OTP: </strong>" . htmlspecialchars($lokasi) . "</p>";
        echo "<p>Pendaftaran akun Anda terkirim. Silahkan mengecek " . htmlspecialchars($lokasi) . " " . htmlspecialchars($tlp) . " untuk mendapatkan kode OTP verifikasi.</p>";
    }
} else {
    echo "Silahkan lengkapi formulir di atas.";
}
?>