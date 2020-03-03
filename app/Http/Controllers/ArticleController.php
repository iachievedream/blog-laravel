<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('article.index')->with('articles', $article);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        //Illuminate\Foundation\Validation\Validator;
        $request -> validate([
            'title' => 'required|max:25',
            'content' => 'required|max:255',
        ]);
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::user()->name,
        ]);
        return Redirect('/');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show')->with('articles', $article);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view("article.edit")->with('articles', $article);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:25',
            'content' => 'required|max:255',
        ]);
        $title = $request->title;
        $content = $request->content;

        DB::table('articles')
            ->where('id',$id)
            ->update(['title'=>$title,'content'=>$content]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/');
    }
}