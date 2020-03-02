@if(isset(Auth::user()->name))
    使用者：{{Auth::user()->name}}<br>
@else
    進入身分：訪客<br>
@endif

<a href="edit/{{$article->id}}">編輯</a>
<form action="delete/{{$article->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">刪除</button>
</form>
<a href="/">上一頁</a><br>
單一文章列表<br>
標題---內容---作者<br>
{{$article->title}}---
{{$article->content}}---
{{$article->author}}