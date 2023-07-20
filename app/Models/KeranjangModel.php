<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    protected $allowedFields = ['user_id', 'jaket_id', 'order_id'];

    public function getKeranjang()
    {
        return $this->db->table('keranjang')
            ->join('user', 'user.id_user=keranjang.user_id')
            ->join('jaket', 'jaket.id_jaket=keranjang.jaket_id')
            ->where('user_id', session()->get('id_user'))
            // ->join('order', 'order.id_order=keranjang.order_id')
            // ->get()->getResultArray();
            ->get()->getRowArray();
    }
}
