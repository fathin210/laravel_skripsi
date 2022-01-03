<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    protected $table = 'teknisi';
    protected $primaryKey = 'id_teknisi';
}
