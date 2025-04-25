<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // 'post_id' Ya no se necesita por la relación de Eloquent que hay en el modelo de Post
    ];
}
