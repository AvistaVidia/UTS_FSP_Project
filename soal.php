<?php
require_once 'connection.php';

class soal
{
    private $db;

    public function __construct()
    {
        require 'connection.php';
        $this->db = $mysqli;
    }

    public function selectAllSoal() { //dipake buat halaman kesimpulan nentuin skor
        $stmt = $this->db->prepare("SELECT * FROM soal");
        $stmt->execute();
        $res = $stmt->get_result();
        
        $data = [];
        
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }

    public function getSoalByHalaman($halaman) //menampilkan soal berdasarkan halaman_ke
    {
        $stmt = $this->db->prepare("SELECT * FROM soal WHERE halaman_ke = ? ORDER BY nomor ASC");
        $stmt->bind_param("i", $halaman);
        $stmt->execute();
        $res = $stmt->get_result();

        $data = [];
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
