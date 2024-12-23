<?php
//Modelの設計図
//モデルclassを使いたいときはインスタンス化（実体化）させる

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Includealchole extends Model
{
    use HasFactory;
    protected $table = 'includes';
    protected $fillable = [
        'name',
        'strange',
    ];

    public function cocktails(){
        return $this->belongsToMany(Cocktail::class,'cocktail_include','include_id','cocktail_id');
    }

    public function recipes(){
        return $this->belongsToMany(Recipe::class,'include_recipe','include_id','recipe_id');
    }

    public function getByIncludealc(int $limit_count = 10)
    {
        return $this->recipes()->with('include')->orderBy('updated_at', 'DESC')->get();
        //$this:モデル自身のこと
        //ORM 
    }

}
