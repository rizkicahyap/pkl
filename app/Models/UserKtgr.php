<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKtgr extends Model
{
    protected $table = 'kategori';

    public function jml()
    {
        return $this->hasMany(UserDash::class, 'id_kategori', 'id');
    }
}
