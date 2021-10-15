<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminFS1 extends Model
{
    protected $table = 'format_surat1';
    protected $fillable = ['id_kategori', 'judul_format', 'keterangan', 'filename'];

    public function kategori()
    {
        return $this->belongsTo(AdminKtgr::class, 'id_kategori', 'id');
    }

}
