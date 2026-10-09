<?php
require_once 'connection.php';

class Jawaban extends Koneksi {
    public function __construct() 
    {
        parent::__construct();
    }

    public function getJawabanBySoal($idsoal) { //buat jawaban yang dipilih oleh user jd bisa ttp ke checked radiobuttonnya
        $stmt = $this->mysqli->prepare("SELECT * FROM jawaban WHERE idsoal = ? ORDER BY RAND()");
        $stmt->bind_param("i", $idsoal);
        $stmt->execute();
        $res = $stmt->get_result();
        
        $data = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getJawabanById($idjawaban) { //buat halaman kesimpulan untuk cek skor
        $stmt = $this->mysqli->prepare("SELECT * FROM jawaban WHERE idjawaban = ?");
        $stmt->bind_param("i", $idjawaban);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc();
    }

    public function getJawabanBenar($idsoal) { //buat menampilkan jawaban yang benar
        $stmt = $this->mysqli->prepare("SELECT * FROM jawaban WHERE idsoal = ? AND benarkah = 1");
        $stmt->bind_param("i", $idsoal);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc();
    }
}
?>