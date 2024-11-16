<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Includealchole extends Model
{
    use HasFactory;
    protected $table = 'includes';
    protected $fillable = [
        'name',
        'strange'
    ];
}
