<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
// use App\User;
use Illuminate\Support\Facades\Auth;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $article = $this->articleService->indexService();
        return view('article.index')->with('articles', $article);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $message = $this->articleService->storeService($request->all());
        if ($message == false) {
            return Redirect()->back();
        }
        return Redirect('/');
    }

    public function show($id)
    {
        $article = $this->articleService->showservice($id);
        return view('article.show')->with('articles', $article);
    }

    public function edit($id)
    {
        $article = $this->articleService->editService($id);
        return view('article.edit')->with('articles', $article);
    }

    public function update(Request $request,$id)
    {
        $message = $this->articleService->updateService($request->all(),$id);
        if ($message == false) {
            return redirect()->back();
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        $this->articleService->deleteService($id);
        return redirect('/');
    }
    
    // public function test(Request $request)
    // {
    //     // return "Me is here";
    //     $article = new Article();
    //     $article->title = $request->'title';
    //     $article->content = $request->'content';
    //     $$article->save();

    // }
}