<?php

namespace App\Http\Mod\Mesas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    use HasFactory;

    protected $fillable = [
        'sillas',
        'estado'
    ];
}
