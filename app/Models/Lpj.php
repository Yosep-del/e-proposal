<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpj extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $table  = "lpj";
    

    public $timestamps = false;
}
