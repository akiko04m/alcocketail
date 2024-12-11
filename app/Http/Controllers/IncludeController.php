<?php

//裏側からデータを処理する→データを返す

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Includealchole;

//メソッドを一個にしちゃっても全然動く
//分け方自体は自由
//mvcmodel = ララベルはこれも元に作られている
//model:データ
//プロンプトから送られてきたものを役割に合わせての動作の仕方を書くところがコントローラー

class IncludeController extends Controller
{
    public function index(Includealchole $includes){
        return view('include.\show')->with(['includes' => $includes->get()]);
        return redirect('/dashboard');
    }//今回のindex = 一番最初に見られるファイル大元



    public function create(){
        //return view('include/create');//viewsから見た目を持ってくる
        return view('include.create')->with(['categories' => $includes->get()]);
    }


    public function sort(Request $request, Includealchole $include){
       // $include=new Includealchole
       $input=$request['include'];
       $include->fill($input)->save();//データ保存
       return redirect('/dashboard');//web.phpに戻る
    }//保存処理

    //7-4
}
