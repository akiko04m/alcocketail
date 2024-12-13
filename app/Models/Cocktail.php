<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{

    use HasFactory;

    protected $fillable = [
    'name',
    'strange',
    ];

    public function includes(){
        return $this->belongsToMany(Includealchole::class,'cocktail_include','cocktail_id','include_id');
        //return $this->belongsToMany(相手方のモデル名::class,'モデル名_モデル名（中間テーブル名）','自分の_id','リレーションを持った先の_id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
