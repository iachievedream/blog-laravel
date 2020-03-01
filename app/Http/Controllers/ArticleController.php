<?php

namespace App\Http\Controllers;

// use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\User;
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
        //Illuminate\Foundation\Validation\Validator;
        $request->validate([
            'title'=>'required|max:25',
            'content'=>'required|max:255',
        ]);
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
        //文章的作者
        $article = Article::find($id);
        // dd($article);
        $arthor = $article->author;
        // dd($arthor);
        
        //登入使用者
        $user = Auth::user()->name;
        // dd($user);

        //管理員判斷
        $userid = Auth::user()->id;
        // dd($userid);
        $roles = User::find($userid);
        $role = $roles->role;
        dd($role);
        // dd($role == 'admin');

        if($arthor == $user and $role == "admin"){
            // return("正確");
            // $article = Article::find($id);//上面有使用相同程式碼
            return view("article.edit")->with('article', $article);
        }else{
            return("非作者或管理員權限");
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'=>'required|max:25',
            'content'=>'required|max:255',
        ]);
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
        //文章作者
        $article = Article::find($id);
        $author = $article->author;
        //登入使用者
        $user = Auth::user()->name;
        //管理員判斷
        $userid = Auth::user()->id;
        $roles = User::find($userid);
        $role = $roles->role;
        if($author ==$user and $role == "admin"){
            $article->delete();
            return redirect('/');
        }else{
            return ("非作者或管理員權限");
        }
    }
}