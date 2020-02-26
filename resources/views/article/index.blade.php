@guest
	<a href="{{route('login')}}">登入</a>
	<a href="{{route('register')}}">註冊</a>
@else
	使用者為：{{Auth::user()->name}}
	<form method="POST" action="{{route('logout')}}">
		<button type="submin">登出</button>
		@csrf
	</form>
@endguest

<a href="create">新增文章</a>
文章列表