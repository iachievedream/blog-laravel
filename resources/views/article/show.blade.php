@if($article->author == Auth::user()->name)
    使用者：{{Auth::user()->name}}<br>
    <a href="edit/{{$article->id}}">編輯</a>
    <form action="delete/{{$article->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">刪除</button>
    </form>
@elseif(Auth::check())
    身分者：{{Auth::user()->name}}
@else
    進入身分：訪客
@endif
<a href="/">上一頁</a><br>
@if (isset($article))
    單一文章列表<br>
    標題---內容---作者<br>
    {{$article->title}}---
    {{$article->content}}---
    {{$article->author}}
@endif
