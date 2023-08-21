<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'limit',
        'valid_until',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($link) {
            $link->uuid =  Str::random(8);
        });
    }
}
