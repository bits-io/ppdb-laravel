<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftaran_id',
        'no_pembayaran',
        'nama_bank',
        'bukti',
        'total_bayar',
        'status'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pembayaran) {
            $prefix = 'BYR-';
            $date = now()->format('Ymdhis');
            $unique = uniqid();

            $pembayaran->no_pembayaran = "{$prefix}{$date}-{$unique}";
        });
    }
}
