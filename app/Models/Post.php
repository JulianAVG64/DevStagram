<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select([
            'name',
            'username'
        ]);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Revisar si un usuario ya le dio like al post
    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
