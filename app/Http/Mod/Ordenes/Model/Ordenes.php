<?php

namespace App\Http\Mod\Ordenes\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Mod\Mesas\Models\Mesas;

class Ordenes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mesa_id',
        'estado',
    ];

    public function UserRelation() {
        return $this->belongsTo(User::class,  'user_id');
    }

    public function TableRelation() {
        return $this->belongsTo(Mesas::class,  'mesa_id');
    }
}
