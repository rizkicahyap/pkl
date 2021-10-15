<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSM1 extends Model
{
    protected $table = 'data_surat1';
    protected $fillable = ['no_surat', 'perihal', 'tgl_surat', 'tgl_diterima', 'filename', 'id_kategori', 'sts_surat', 'user_id', 'req_akses', 'akses'];

    public function kategori()
    {
        return $this->belongsTo(UserKtgr::class, 'id_kategori', 'id');
    }
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }
}
