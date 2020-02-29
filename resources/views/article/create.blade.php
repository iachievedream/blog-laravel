<title>新增文章</title>
<form action="store" method="post">
	@csrf
	標題:<input type="text" name="title">
	內容:<input type="text" name="content">
	<button type="submit" value="新增">
</form>
