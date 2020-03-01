@if(isset(Auth::user()->name))
    @if($article->author == Auth::user()->name)
        文章作者登入：{{Auth::user()->name}}<br>
    @endif
    使用者：{{Auth::user()->name}}<br>
@else
    訪客，無權編輯頁面。
@endif

編輯文章
<form action="update/{{$article->id}}" method="POST">
    @method('PUT')
    @csrf
    標題：<input type="text" name="title" value="{{$article->title}}">
    內容：<input typy="text" name="content" value="{{$article->content}}">
    <button type="submit">更新</button>
</form>

@error('title')
    {{massage}}
@enderror

@error('content')
    {{massage}}
@enderror