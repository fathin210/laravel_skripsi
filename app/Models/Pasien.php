<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pasien extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nomor_pasien',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telepon'
    ];


    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
}
