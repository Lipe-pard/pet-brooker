<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'pet_id',
        'date_time',
        'service',
        'status',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
