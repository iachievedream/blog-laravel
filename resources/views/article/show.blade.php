@guest
    使用身分：訪客
@else
    使用者：{{Auth::user()->name}}<br>
    <a href="edit/{{$article->id}}">編輯</a>
    <form action="delete/{{$article->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submin">刪除</button>
    </form>
@endguest

<a href="/">上一頁</a><br>
@if (isset($article))
    單一文章列表<br>
    標題---內容---作者<br>
    {{$article->title}}---
    {{$article->content}}---
    {{$article->author}}
@endif
