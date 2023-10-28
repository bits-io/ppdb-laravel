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

    public function getBuktiAttribute($value)
    {
        // Check if the value is not empty
        if (!empty($value)) {
            // Prefix the hostname/storage/ to the picture value
            return env('APP_URL') . '/storage/' . $value;
        }

        // If the value is empty, return a default image or whatever you prefer
        // return config('APP_URL') . '/storage/default.jpg';
    }

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
