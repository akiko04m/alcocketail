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
//MAXとかMINを使うときはgroupByちゅうんをつかうんや
class IncludeController extends Controller
{
    public function index(Includealchole $includes){
        $datas = $includes->with([
            'recipes' => function ($query) {
                $query -> select('strange');
            }
        ])->get();
        //データをここでとってくる
        /*
            $datas = $includes->with('recipes')->get();でも同じ挙動はできる！
            けど強さだけ必要なため、strangeだけとってきてるよ！
        */

        $datas->map(function ($incl){
            $incl->max_strange = $incl->recipes->max('strange');
            $incl->min_strange = $incl->recipes->min('strange');
            $incl->recipe_count = $incl->recipes->count();
            return $incl;
        });

        //map関数：for文みたいなもの
        //$datasの塊（$includesにrecipesのstrangeが紐づいている）
        /*
            データ書き換えバージョン
            $datas->map(function ($datasの一個){
            $incl->max_strange(名前だよ！！！) = $incl->recipes->max('strange');
            $incl->min_strange（名前と同じのやつが） = $incl->recipes->min('strange');
            return $incl;
            });
        */
        /*
            $datas->map(function ($datasの一個){
            $incl->max_strange(名前だよ！！！) = $incl->recipes->max('strange');
            $incl->min_strange（名前と同じのやつがあったら更新、無かったら新規作成だよ） = $incl->recipes->min('strange');
            return $incl;
            });

            ※検索：php 配列 map関数
            ->map($data => ($dataをコネこね)).colect()
        */

        return view('include/show')->with(['includes' => $datas]);
    }//今回のindex = 一番最初に見られるファイル大元



    public function create(){
        //return view('include/create');//viewsから見た目を持ってくる
        return view('include/create')->with(['categories' => $includes->get()]);
    }


    public function sort(Request $request, Includealchole $include){
       // $include=new Includealchole
       $input=$request['include'];
       //$request = ユーザー側からのすべての情報がrequestに
       //[ほしい情報の指定]
       $include->fill($input)->save();//データ保存
       return redirect('/include');//web.phpに戻る
    }//保存処理

    //7-4
}
