<?php
function infoKuota($kuota) {
    if ($kuota == "1GB / 3 hari") {
        return "1GB / 3 hari";
    } elseif ($kuota == "2GB / 5 hari") {
        return "2GB / 5 hari";
    } elseif ($kuota == "5GB / 7 hari") {
        return "5GB / 7 hari";
    }
    return "";
}

function dapatDiskon($totalBayar) {
    if ($totalBayar >= 25000) {
        return 0.20;
    }
    return 0;
}

function totalHarga($diskon, $totalBayar) {
    return $totalBayar - ($totalBayar * $diskon);
}
?>

<h2>Belanja Pulsa dan Paket Data</h2>
<h3>Tersedia</h3>
<form method="POST" action="">
    <p>Pulsa : <br />
        <select name="pulsa">
            <option value="">-- Pilih --</option>
            <option value="5000">5000</option>
            <option value="10000">10000</option>
            <option value="20000">20000</option>
        </select>
    </p>
    <p>Paket Data : <br />
        <select name="paket">
            <option value="">-- Pilih --</option>
            <option value="1GB / 3 hari">1 GB / 3 hari</option>
            <option value="2GB / 5 hari">2GB / 5 hari</option>
            <option value="5GB / 7 hari">5GB / 7 hari</option>
        </select>
    </p>
    <button type="submit">Beli</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pulsa = $_POST['pulsa'] ?? '';
    $paket = $_POST['paket'] ?? '';
    $error = array();
    $hargaPulsa = 0;
    $hargaPaket = 0;

    if (empty($pulsa) || empty($paket)) {
        $error[] = "Harap pilih pulsa dan paket data.";
    }

    if ($pulsa == "5000") {
        $hargaPulsa = 6000;
    } elseif ($pulsa == "10000") {
        $hargaPulsa = 11000;
    } elseif ($pulsa == "20000") {
        $hargaPulsa = 21000;
    }

    if ($paket == "1GB / 3 hari") {
        $hargaPaket = 10000;
    } elseif ($paket == "2GB / 5 hari") {
        $hargaPaket = 15000;
    } elseif ($paket == "5GB / 7 hari") {
        $hargaPaket = 20000;
    }

    if (!empty($error)) {
        foreach ($error as $pesan) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($pesan) . " !!</p>";
        }
    } else {
        $totalBayar = $hargaPulsa + $hargaPaket;
        $diskon = dapatDiskon($totalBayar);
        $total = totalHarga($diskon, $totalBayar);
        $kuota = infoKuota($paket);

        echo "<h2>Informasi Belanja</h2>";
        echo "<p><strong>Pulsa: </strong>" . htmlspecialchars($pulsa) . "</p>";
        echo "<p><strong>Paket Data: </strong>" . htmlspecialchars($kuota) . "</p>";
        echo "<p><strong>Total Harga: </strong>Rp" . htmlspecialchars($total) . "</p>";
        echo "<p><strong>Diskon: </strong>" . htmlspecialchars($diskon) . "</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " . (htmlspecialchars($diskon * 100)) . "%.</p>";
        }
    }
} else {
    echo "Silahkan pilih produk yang ingin dibeli.";
}
?>