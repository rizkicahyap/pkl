<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKtgr extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_ktgr', 'req_akses', 'akses'];

    public function jml()
    {
        return $this->hasMany(AdminDash::class, 'id_kategori', 'id');
    }
 
}
