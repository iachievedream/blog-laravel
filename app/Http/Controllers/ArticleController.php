<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
// use App\User;
use app\index\controller\Articl;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('article.index')->with('article', $article);
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
        $article->save();
        return Redirect('/');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show')->with('article', $article);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view("article.edit")->with('article', $article);
    }

    public function update(Request $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::user()->name,
        ]);
        $article->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/');
    }
}