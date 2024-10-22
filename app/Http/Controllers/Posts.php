<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Posts extends Controller
{
    public function index()
    {
        //query builder
//        $posts = DB::select("SELECT * FROM posts WHERE id=:id;",
//        [
//            'id' => 1
//        ]);
        $posts = DB::table('posts')
            ->where('id', 3)
            ->select('title')
            ->get();
        dd($posts);
        //return view('posts.index');
    }
}
