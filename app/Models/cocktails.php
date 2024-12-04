<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cocktails extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'body',
    'includes_id'];

    public function includes(){
    return $this->belongsToMany(Includealchole::class);
}
}
