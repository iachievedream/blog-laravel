<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //訪客需要轉至登入頁面
    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }

    public function index()
    {
    	return view('article.index');
    }

    public function create()
    {
    	return view('article.create');
    }
    public function store(Request $request)
    {
        // echo 1;exit();
        // dd($request);

        $Article=Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::user(),
        ]);
        // dd($authe);
    }

}
