<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class usuario extends Authenticatable
{
    use HasApiTokens,HasRoles, HasFactory;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'nombre',
        'password',
        'municipio_id',
        'telefono',
        'avatar',
        'remember_token',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token','municipio_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed'
    ];

    /**
     * Define la relación de pertenencia a un municipio.
     */
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function particular()
    {
        return $this->hasOne(Particular::class);
    }

    public function comercio()
    {
        return $this->hasOne(Comercio::class);
    }

    public function ayuntamiento()
    {
        return $this->hasOne(Ayuntamiento::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($usuario) {
            $usuario->particular()->delete();
            $usuario->comercio()->delete();
            $usuario->ayuntamiento()->delete();
        });
    }
}
