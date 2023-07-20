<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table = 'ulasan';
    protected $useTimestamps = true;

    protected $allowedFields = ['id_pengguna', 'ulasan', 'foto_ulasan', 'anonim'];

    public function getUlasan()
    {
        return $this->db->table('ulasan')
            ->join('user', 'user.id_user=ulasan.id_pengguna')
            ->orderBy('id', 'DESC')
            ->get()->getResultArray();
    }
    public function get4Ulasan()
    {
        return $this->db->table('ulasan')
            ->join('user', 'user.id_user=ulasan.id_pengguna')
            ->orderBy('id', 'DESC')
            ->get(4)->getResultArray();
    }
}
