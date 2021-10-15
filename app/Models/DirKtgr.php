<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirKtgr extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_ktgr', 'req_akses', 'akses'];

    public function jml()
    {
        return $this->hasMany(DirDash::class, 'id_kategori', 'id');
    }
}
