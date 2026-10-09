<?php
session_start();

require_once 'soal.php';
require_once 'jawaban.php';

$objSoal = new Soal();
$objJawaban = new Jawaban();

$halamanTerakhir = $objSoal->getMaxHalaman();

if (isset($_SESSION['halaman'])) {
    $halaman = $_SESSION['halaman'];
} else {
    $halaman = 1;
}

if (!isset($_SESSION['jawaban'])) {
    $_SESSION['jawaban'] = array();
}
if (!isset($_SESSION['benar'])) {
    $_SESSION['benar'] = array();
}

if (isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];

    $pilihan = array();
    if (isset($_POST['jawaban'])) {
        $pilihan = $_POST['jawaban'];
    }

    foreach ($pilihan as $idsoal => $idjawaban) {
        $data = $objJawaban->getJawabanById($idjawaban);
        if ($data && $data['idsoal'] == $idsoal) {
            $_SESSION['jawaban'][$idsoal] = $idjawaban;
            $_SESSION['benar'][$idsoal] = ($data['benarkah'] == 1);
        }
    }

    if ($aksi == "next") {
        if ($halaman >= $halamanTerakhir) {
            header("location: kesimpulan.php");
            exit();
        }
        $_SESSION['halaman'] = $halaman + 1;
    } else if ($aksi == "previous") {
        if ($halaman > 1) {
            $_SESSION['halaman'] = $halaman - 1;
        }
    }

    header("location: index.php");
    exit();
}

if (!is_numeric($halaman) || $halaman < 1) {
    $halaman = 1;
}
if ($halaman > $halamanTerakhir) {
    $halaman = $halamanTerakhir;
}

$daftarSoal = $objSoal->getSoalByHalaman($halaman);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis - Halaman <?php echo $halaman; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h2>Halaman <?php echo $halaman; ?> dari <?php echo $halamanTerakhir; ?></h2>

        <form method="POST" action="index.php">
            <?php
            foreach ($daftarSoal as $s) {
                echo "<div class='soal'>";
                echo "<h3>Soal " . $s['nomor'] . "</h3>";
                echo "<p>" . htmlentities($s['pertanyaan']) . "</p>";

                $daftarJawaban = $objJawaban->getJawabanBySoal($s['idsoal']);
                foreach ($daftarJawaban as $j) {
                    $checked = "";
                    if (isset($_SESSION['jawaban'][$s['idsoal']])) {
                        if ($_SESSION['jawaban'][$s['idsoal']] == $j['idjawaban']) {
                            $checked = "checked";
                        }
                    }

                    echo "<label class='opsi'>";
                    echo "<input type='radio' name='jawaban[" . $s['idsoal'] . "]' value='" . $j['idjawaban'] . "' " . $checked . ">";
                    echo htmlentities($j['isi_jawaban']);
                    echo "</label>";
                }

                echo "</div>";
            }
            ?>

            <div class="navigasi">
                <?php
                if ($halaman > 1) {
                    echo "<button type='submit' name='aksi' value='previous'>Previous</button>";
                }
                ?>
                <button type="submit" name="aksi" value="next" class="kanan">Next</button>
            </div>
        </form>
    </div>
</body>

</html>