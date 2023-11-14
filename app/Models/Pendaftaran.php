<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'admin_id',
        'no_pendaftaran',
        'jalur',
        'status'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendaftaran) {
            $prefix = 'DFTR-';
            $date = now()->format('Ymdhis');
            $unique = uniqid();

            $pendaftaran->no_pendaftaran = "{$prefix}{$date}-{$unique}";
        });
    }
}
