<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktail;

class CocktailController extends Controller
{
    public function cocktail(Cocktail $cocktails){
        return view('include.\cocktail')->with(['cocktails' => $cocktails->get()]);
        return redirect('/cocktails');
    }//今回のindex = 一番最初に見られるファイル大元
}
