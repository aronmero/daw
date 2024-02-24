<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class particular extends Model
{
    use HasFactory;
    protected $table = 'particulares';
    public $timestamps = false;
}
