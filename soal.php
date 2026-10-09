<?php
require_once 'connection.php';

class Soal extends Koneksi {
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAllSoal() { //dipake buat halaman kesimpulan nentuin skor
        $stmt = $this->mysqli->prepare("SELECT * FROM soal ORDER BY halaman_ke ASC, nomor ASC");
        $stmt->execute();
        $res = $stmt->get_result();
        
        $data = array();
        
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }

    public function getSoalByHalaman($halaman) //menampilkan soal berdasarkan halaman_ke
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM soal WHERE halaman_ke = ? ORDER BY nomor ASC");
        $stmt->bind_param("i", $halaman);
        $stmt->execute();
        $res = $stmt->get_result();

        $data = array();
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getMaxHalaman(){
        $stmt = $this->mysqli->prepare("SELECT MAX(halaman_ke) AS max_halaman FROM soal");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_assoc();

        if(isset($data['max_halaman'])) {
            return $data['max_halaman'];
        } 
        else {
            return 1;
        }
    }
}
