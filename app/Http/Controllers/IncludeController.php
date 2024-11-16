<?php

//裏側からデータを処理する→データを返す

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Includealchole;

class IncludeController extends Controller
{
    public function create(){
        return view('include/create');//viewsから見た目を持ってくる
    }

    public function sort(Request $request, Includealchole $include){
       // $include=new Includealchole
       $input=$request['include'];
       $include->fill($input)->save();//データ保存
       return redirect('/dashboard');//web.phpに戻る
    }//保存処理

    //7-4
}
