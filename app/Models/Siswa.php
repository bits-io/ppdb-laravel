<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'email',
        'password',
        'status'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id');
    }

    public function orangtua()
    {
        return $this->hasOne(OrangTua::class, 'id');
    }

}
