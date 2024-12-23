<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Includealchole;

//phpは動的型付け言語！！わからんくなったら調べろ！！！

class RecipeController extends Controller
{
    public function recipe_create(){
        //laravelでは関数の引数の中でインスタンス化が出来る
        $include = new Includealchole;//インスタンス化だよ！
        return view('include/create_recipe')->with(['includes' =>$include->get()]);
        //with(['includes' =>$include->get()]):includesという名前で$includeを返す
    }

    //インスタンス化を引数でやるときはrequestが先じゃないかなぁ多分
    public function edit(Request $request, Recipe $recipe){
        //dump($request['recipe']);
        //dumpは処理を止めないdd
        //ddとセットで使えよ！
        //dd($request['includes_array']);
        //☆デバック関数：ddが来た段階で処理を止めて()内の値を返す

        $input_recipe = $request['recipe'];
        $input_includes = $request->includes_array;

        $texts = array_values($request->process);//array_values()：連想配列を配列に変換するメソッド
        //dump($texts);
        // texts 配列を「/」で結合
        $combinedTexts = implode('/', $request->process);
        //dd($combinedTexts);
        // 結合したデータを Recipe モデルの process に保存
        $input_recipe['process'] = $combinedTexts;

        //dd($input_recipe);

        $recipe->fill($input_recipe)->save();
        dd($recipe);
        $recipe->includes()->attach($input_includes);

        // texts を JSON デコードして配列に変換

        //dump($request->process);

        return redirect('/recipe/create');
    }

    public function show(Recipe $recipe){
        //形式的にはバックエンドのほうがいい
        $include = new Includealchole;

        $recipes = $include->find(5)->recipes()->get();
        //$recipesは変数だから関数を使えない

        return view('include/recipe')->with(['recipes' => $recipes]);
        //return view('include/recipe')->with(['recipes' => $recipes->get()]);

    }




}
