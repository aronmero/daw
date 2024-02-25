<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seguido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'seguidor_id', 'seguido_id'
    ];

    public function seguidor()
    {
        return $this->belongsTo(Usuario::class, 'seguidor_id');
    }

    public function seguido()
    {
        return $this->belongsTo(Usuario::class, 'seguido_id');
    }
}
