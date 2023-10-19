<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

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
