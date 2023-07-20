<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePengirimanModel extends Model
{
    protected $table      = 'metode_pengiriman';
    protected $primaryKey = 'mpengiriman_id';

    public function getMetode($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['mpengiriman_id' => $id])->first();
    }
}
