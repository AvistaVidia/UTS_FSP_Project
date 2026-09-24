<?php
class Jawaban {
    private $db;

    public function __construct() 
    {
        require 'connection.php';
        $this->db = $mysqli;
    }

    public function getJawabanBySoal($idsoal) { //buat jawaban yang dipilih oleh user jd bisa ttp ke checked checkboxnya
        $stmt = $this->db->prepare("SELECT * FROM jawaban WHERE idsoal = ? ORDER BY RAND()");
        $stmt->bind_param("i", $idsoal);
        $stmt->execute();
        $res = $stmt->get_result();
        
        $data = [];
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getJawabanById($idjawaban) { //buat halaman kesimpulan untuk cek skor
        $stmt = $this->db->prepare("SELECT * FROM jawaban WHERE idjawaban = ?");
        $stmt->bind_param("i", $idjawaban);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getJawabanBenar($idsoal) { //buat menampilkan jawaban yang benar
        $stmt = $this->db->prepare("SELECT * FROM jawaban WHERE idsoal = ? AND benarkah = 1");
        $stmt->bind_param("i", $idsoal);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>