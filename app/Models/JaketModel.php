<?php

namespace App\Models;

use CodeIgniter\Model;

class JaketModel extends Model
{
    protected $table      = 'jaket';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_jaket';

    protected $allowedFields = ['nama_jaket', 'ukuran', 'kondisi', 'harga', 'jenis', 'foto_jaket'];

    public function getJaket($id = false)
    {
        if ($id == false) {
            // return $this->findAll();
            return $this->db->table('jaket')
                ->orderBy('id_jaket', 'DESC')
                ->get()->getResultArray();
        }

        return $this->where(['id_jaket' => $id])->first();
    }

    public function get4Jaket()
    {
        return $this->db->table('jaket')
            ->orderBy('nama_jaket', 'ASC')
            ->get(4)->getResultArray();
    }
}
