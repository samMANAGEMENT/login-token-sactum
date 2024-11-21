<?php

namespace App\Http\Mod\Reserva\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Mod\Mesas\Models\Mesas;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'mesa_id',
        'fecha_reserva',
        'estado',
        'canal',
    ];

    public function UserRelation() {
        return $this->belongsTo(User::class,  'usuario_id');
    }

    public function TableRelation() {
        return $this->belongsTo(Mesas::class,  'mesa_id');
    }
}
