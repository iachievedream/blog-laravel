<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
