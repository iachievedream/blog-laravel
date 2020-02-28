@guest
	<a href="{{route('login')}}">登入</a>
	<a href="{{route('register')}}">註冊</a>
@else
	<form method="POST" action="{{route('logout')}}">
		使用者為：{{Auth::user()->name}}
		<button type="submin">登出</button>
		@csrf
	</form>
@endguest

<a href="create">新增文章</a><br>
文章列表<br>
標題--作者<br>
@foreach($article as $article)
	<a href="show/{{$article->id}}">{{$article->title}}</a>---
	<!-- {{$article->content}} -->
	{{$article->author}}<br>
@endforeach