<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadDamage extends Model
{
    use HasFactory;

    protected $table = 'roaddamages';
    public $timestamps = true;

    protected $fillable = [
        'kota',
        'kabupaten',
        'lebar_jalan',
        'riwayat_banjir'
    ];
}
