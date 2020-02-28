<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use app\index\controller\Articl;
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
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::user()->name,
        ]);

        // $title = $request->title;
        // $content = $request ->content;

        // $article = new Article();
        // $article -> title = $title;
        // $article -> content = $content;
        // $article -> Auth::user()->name = $author;
        $article -> save();
        return Redirect('/');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show')->with('article',$article);
    }

    public function edit($id)
    {
        $article=Article::find($id);
        return view("article.edit")->with('article',$article);
    }

    public function update(Request $request,Article $article)
    {
        // return 'ABC';
        // $title = $request ->title;
        // $content = $request ->content;
        // $article ->title = $title;
        // $article ->content = $content;

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::user()->name,
        ]);
        $article ->save();        
        return redirect('/');
    }

    public function destroy($id)
    {
        // return "abc";
        $article =Article::find($id);
        // dd($article);
        $article->delete();
        return redirect('/');
    }

}
