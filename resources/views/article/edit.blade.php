編輯文章
<form action="update/{{$article->id}}" method="POST">
    @method('PUT')
    @csrf

    標題：<input type="text" name="title" value="{{$article->titie}}">
    內容：<input typy="text" name="content" value="{{$article->content}}">
    <input type="submit" value="更新">
</form>