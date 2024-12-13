<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Includealchole;

class RecipeController extends Controller
{
    public function recipe_create(){
        //laravelでは関数の引数の中でインスタンス化が出来る
        $include = new Includealchole;//インスタンス化だよ！
        return view('include/create_recipe')->with(['includes' =>$include->get()]);
    }

    //インスタンス化を引数でやるときはrequestが先じゃないかなぁ
    public function edit(Request $request, Recipe $recipe){
        //dump($request['recipe']);
        //dumpは処理を止めないdd
        //ddとセットで使えよ！
        //dd($request['includes_array']);
        //☆デバック関数：ddが来た段階で処理を止めて()内の値を返す

        $input_recipe = $request['recipe'];
        $input_includes = $request->includes_array;


        $recipe->fill($input_recipe)->save();

        $recipe->includes()->attach($input_includes);
        return redirect('/recipe/create');
    }
}
