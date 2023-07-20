<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'id_order';
    protected $createdField  = 'tanggal_pembelian';
    protected $updatedField  = 'tanggal_pembayaran';
    protected $allowedFields = ['status_ulasan'];

    public function getRiwayat($id = false)
    {
        if ($id == false) {
            return $this->db->table('order')
                ->join('user', 'user.id_user=order.user_id')
                ->join('jaket', 'jaket.id_jaket=order.jaket_id')
                ->join('metode_pembayaran', 'metode_pembayaran.id_mpembayaran=order.mpembayaran_id')
                ->join('metode_pengiriman', 'metode_pengiriman.id_mpengiriman=order.mpengiriman_id')
                ->where('user_id', session()->get('id_user'))
                ->orderBy('id_order', 'DESC')
                ->get()->getResultArray();
        }

        $db = \Config\Database::connect();
        $builder = $db->table('order');
        return $builder->join('user', 'user.id_user=order.user_id')
            ->join('jaket', 'jaket.id_jaket=order.jaket_id')
            ->join('metode_pembayaran', 'metode_pembayaran.id_mpembayaran=order.mpembayaran_id')
            ->join('metode_pengiriman', 'metode_pengiriman.id_mpengiriman=order.mpengiriman_id')
            ->where('id_order', $id)
            ->get()->getRowArray();
    }
}
