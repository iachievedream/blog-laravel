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
        $article = Article::all();
    	return view('article.index')->with('article',$article);
    }

    public function create()
    {
    	return view('article.create');
    }
    public function store(Request $request)
    {
        //手冊的內容，有些奇怪
        // $title=$request->input('title');
        // dd($title);

        // $user =Auth::user()->name;
        // dd($user);

        // $Auth=Auth::guard();
        // dd($Auth);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::user()->name,
        ]);
        // dd($article);
        $article ->save();
        return Redirect('/');
    }

}
