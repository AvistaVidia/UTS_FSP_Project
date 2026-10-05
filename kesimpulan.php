<?php
session_start();

require_once 'soal.php';
require_once 'jawaban.php';

$objSoal = new soal();
$objJawaban = new Jawaban();

$daftarSoal = $objSoal->selectAllSoal();

$jawabanUser = array();
$jawabanBenar = array();
if (isset($_SESSION['jawaban'])) {
    $jawabanUser = $_SESSION['jawaban'];
}
if (isset($_SESSION['benar'])) {
    $jawabanBenar = $_SESSION['benar'];
}

$jumlahBenar = 0;
foreach ($jawabanBenar as $idsoal => $benar) {
    if ($benar == true) {
        $jumlahBenar++;
    }
}

$nilai = $jumlahBenar * 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesimpulan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="hasil-soal">
            <?php
            foreach ($daftarSoal as $s) {
                $idsoal = $s['idsoal'];

                $teksJawaban = "Tidak dijawab";
                $status = "Salah";
                if (isset($jawabanUser[$idsoal])) {
                    $idjawaban = $jawabanUser[$idsoal];
                    $dataJawaban = $objJawaban->getJawabanById($idjawaban);

                    if ($dataJawaban) {
                        $teksJawaban = $dataJawaban['isi_jawaban'];
                    }
                    if (isset($jawabanBenar[$idsoal])) {
                        if ($jawabanBenar[$idsoal] == true) {
                            $status = "Benar";
                        }
                    }
                }
            ?>
            
            <div class="soal">
                <h3>Soal <?php echo $s['nomor']; ?></h3>
                <p><?php echo htmlentities($s['pertanyaan']); ?></p>
                <p>Jawaban:<b><?php echo htmlentities($teksJawaban); ?></b></p>
                <p>Status:<b><?php echo $status; ?></b></p>
            </div>
            <?php
            }
            ?>
        </div>
        
        <div class="nilai">
            <h1>Skor Akhir: <?php echo $nilai; ?></h1>
        </div>

        <a href="playagain.php" class="btn">Main Lagi</a>
    </div>
</body>
</html>