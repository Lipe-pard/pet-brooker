<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'password',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
