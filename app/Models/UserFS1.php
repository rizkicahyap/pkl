<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFS1 extends Model
{
    protected $table = 'format_surat1';
    protected $fillable = ['id_kategori', 'judul_format', 'keterangan','filename', 'user_id'];

    public function kategori()
    {
        return $this->belongsTo(UserKtgr::class, 'id_kategori', 'id');
    }
}
