<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'nama',
        'pekerjaan',
        'penghasilan',
        'no_hp_orangtua'
    ];
}
