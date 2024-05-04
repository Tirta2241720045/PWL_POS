<?php

namespace App\Models;

// use Attribute;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'nama', 'password', 'level_id', 'image']; 

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    protected function image(): Attribute{
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }

}

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Foundation\Auth\User;

// class UserModel extends User
// {
//     use HasFactory;

//     protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan
//     /**
//      * The attributes that are mass assignable
//      * 
//      * @var array
//      */
//     protected $fillable = ['level_id', 'username', 'nama', 'password']; 

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }
// }

