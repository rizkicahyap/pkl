<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirPB extends Model
{
    protected $table = 'users';
    protected $fillable = ['validasi', 'req_akses', 'akses'];
}
