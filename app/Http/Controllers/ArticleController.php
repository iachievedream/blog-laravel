<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Article;
// use App\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ArticleRepository;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleRepository;
    // protected $articleService;
    use ArticleService;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $article = $this->articleRepository->getIndex();
        return view('article.index')->with('articles', $article);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        //Illuminate\Foundation\Validation\Validator;
        $this->articleValidator($request->all())->validate();
        $this->articleRepository->getStore($request->all());
        return Redirect('/');
    }

    public function show($id)
    {
        $article = $this->articleRepository->getShow($id);
        return view('article.show')->with('articles', $article);
    }

    public function edit($id)
    {
        $article = $this->articleRepository->getEdit($id);
        return view('article.edit')->with('articles', $article);
    }

    public function update(Request $request,$id)
    {
        $this->articleValidator($request->all())->validate();
        $this->articleRepository->getUpdate($request->all(), $id);
        return redirect('/');
    }

    public function destroy($id)
    {
        $this->articleRepository->getDestroy($id);
        return redirect('/');
    }
}