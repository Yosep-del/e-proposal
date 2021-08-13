<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rincianKegiatan extends Model
{
    protected $guarded  = [];
    protected $table = 'rinciankegiatanlpj';
    public $timestamps = false;
    use HasFactory;
}
    