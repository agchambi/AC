<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorLibro extends Model
{
    use HasFactory;
    protected $table = 'autor_libro';
    protected $hidden = ['created_at', 'updated_at'];
}
