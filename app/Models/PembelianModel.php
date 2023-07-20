<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table      = 'order';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_order';
    protected $createdField  = 'tanggal_pembelian';
    protected $updatedField  = 'tanggal_pembayaran';

    protected $allowedFields = ['user_id', 'jaket_id', 'mpembayaran_id', 'mpengiriman_id', 'foto_bukti', 'status_pembayaran', 'total', 'status_bayar', 'status_ulasan', 'status_konfirmasi', 'status_terima', 'status_tolak', 'no_resi'];

    public function getPembelian()
    {
        return $this->db->table('order')
            ->join('user', 'user.id_user=order.user_id')
            ->join('jaket', 'jaket.id_jaket=order.jaket_id')
            ->join('metode_pembayaran', 'metode_pembayaran.id_mpembayaran=order.mpembayaran_id')
            ->join('metode_pengiriman', 'metode_pengiriman.id_mpengiriman=order.mpengiriman_id')
            ->orderBy('id_order', 'DESC')
            ->get()->getResultArray();
    }

    public function getIdPembelian($id = false)
    {
        if ($id == false) {
            return $this->db->table('order')
                ->join('user', 'user.id_user=order.user_id')
                ->join('jaket', 'jaket.id_jaket=order.jaket_id')
                ->join('metode_pembayaran', 'metode_pembayaran.id_mpembayaran=order.mpembayaran_id')
                ->join('metode_pengiriman', 'metode_pengiriman.id_mpengiriman=order.mpengiriman_id')
                ->get()->getResultArray();
        }

        return $this->db->table('order')
            ->join('user', 'user.id_user=order.user_id')
            ->join('jaket', 'jaket.id_jaket=order.jaket_id')
            ->join('metode_pembayaran', 'metode_pembayaran.id_mpembayaran=order.mpembayaran_id')
            ->join('metode_pengiriman', 'metode_pengiriman.id_mpengiriman=order.mpengiriman_id')
            ->where('id_order', $id)
            ->get()->getRowArray();

        // return $this->where(['id_order' => $id])->first();
    }
}
