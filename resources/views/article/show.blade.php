@auth
使用者：{{route::suer()->name}}
@endauth

@guest
使用身分：訪客
@endguest

<a href="/">上一頁</a><br>
@if (isset($article))
    單一文章列表<br>
    標題---內容---作者<br>
    {{$article->title}}---
    {{$article->content}}---
    {{$article->author}}
@endif

