<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePembayaranModel extends Model
{
    protected $table      = 'metode_pembayaran';
    protected $primaryKey = 'mpembayaran_id';

    public function getMetode($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['mpembayaran_id' => $id])->first();
    }
}
