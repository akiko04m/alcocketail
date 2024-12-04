<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Includealchole;

class PostController extends Controller
{
    public function show(Includealchole $includes){
        return view('include.\show')->with(['includes' => $includes->get()]);
        return redirect('/dashboard');
    }
}
