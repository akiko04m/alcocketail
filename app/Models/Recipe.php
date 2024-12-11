<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'strange',
        'process'
    ];

    public function includes(){
        return $this->belongsToMany(Includealchole::class,'include_recipe','recipe_id','include_id');
    }

    public function cocktail(){
        return $this->belongsTo(Cocktail::class);
    }
}
