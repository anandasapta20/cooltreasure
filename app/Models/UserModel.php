<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['email', 'password', 'nama_lengkap', 'no_hp', 'foto_profil', 'alamat', 'rt_rw', 'kelurahan_desa', 'kecamatan', 'kabupaten_kota', 'provinsi', 'kode_pos'];

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id])->first();
    }
}
