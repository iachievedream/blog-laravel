@if(isset(Auth::user()->name))
    使用者：{{Auth::user()->name}}<br>
@else
    訪客，無權編輯頁面。
@endif

編輯文章
<form action="update/{{$articles->id}}" method="POST">
    @method('PUT')
    @csrf
    標題：<input type="text" name="title" value="{{$articles->title}}">
    內容：<input typy="text" name="content" value="{{$articles->content}}">
    <button type="submit">更新</button>
</form>