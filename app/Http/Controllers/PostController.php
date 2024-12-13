<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Includealchole;

class PostController extends Controller
{
    public function show(Includealchole $includes){
        //return view('リソース')->with(データ);
        //くっつけている
        //[]連想配列(辞書型)：文字列で値を紐付けている[文字列=>value->]
        return view('include.\show')->with(['includes' => $includes->get()]);
        return redirect('/dashboard');
    }
}
