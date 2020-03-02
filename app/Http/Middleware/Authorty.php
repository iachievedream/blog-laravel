<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;

class Authorty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //網址回傳ID
        $id =$request->route('id');
        //文章作者
        $article = Article::find($id);
        // dd($article);
        $author = $article->author;
        // dd($author);
        //登入使用者
        $user = Auth::user()->name;
        //管理員判斷
        $userid = Auth::user()->id;
        $roles = User::find($userid);
        $role = $roles->role;
        // dd($role);
        if($author == $user || $role == "admin"){
            return $next($request);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
