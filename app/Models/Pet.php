<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'type',
        'breed',
        'proprietario_id',
    ];

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class);
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
