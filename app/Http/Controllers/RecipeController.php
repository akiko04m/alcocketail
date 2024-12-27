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
        //dd($recipe);
        $recipe->includes()->attach($input_includes);

        // texts を JSON デコードして配列に変換

        //dump($request->process);

        return redirect('/recipe/create');
    }

    public function show(Recipe $recipe, Includealchole $inc){
        //形式的にはバックエンドのほうがいい
        $include = new Includealchole;
        // dump($include);
        // dd($inc);
        //$inc = Includealchole::find(1);
        //上記を書かなくていい奴→暗黙の結合（ルーティングにｉｄを入れることで勝手にとってきてくれる）
        $title = $inc['name'].'のレシピ';
        $recipes = $inc->recipes()->get();

        //$recipes = $include->recipes()->get();
        //$recipesは変数だから関数を使えない

        //dd($recipes);

        return view('include/recipe')->with(['recipes' => $recipes, 'title'=>$title]);
        //return view('include/recipe')->with(['recipes' => $recipes->get()]);
        //複数渡しは,で区切ればおっけいだよ～
    }

    public function all_show(Recipe $recipe){
        $recipes = $recipe->with('includes')->get();
        $title = "全てのレシピ";
        //dd($recipes[0]->includes);
        return view('include/recipe')->with(['recipes' => $recipes, 'title'=>$title]);
    }
}
