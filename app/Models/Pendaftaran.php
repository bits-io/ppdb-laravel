<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendaftaran) {
            $prefix = 'BYR-';
            $date = now()->format('Ymdhis');
            $unique = uniqid();

            $pendaftaran->no_pendaftaran = "{$prefix}{$date}-{$unique}";
        });
    }
}
