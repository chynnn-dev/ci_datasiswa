<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model{
    protected $table = 'sekolah';
    protected $primaryKey = 'NIS';
    protected $allowedFields = ['nama','jurusan','alamat', 'tahun_masuk', 'asal_sekolah', 'no_telepon', 'status', 'foto'];

    public function getSekolah($idsekolah=false){
        if($idsekolah==false){
            return $this->findAll();
        }
        return $this->where(['NIS'=>$idsekolah])->first();
    }
    public function findSekolah($cari){
        return $this->table('sekolah')->like('nama', $cari);
    }
}
?>