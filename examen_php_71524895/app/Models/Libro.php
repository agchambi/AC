<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['titulo','descripcion','isActive'];


}
