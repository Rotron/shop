<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Восстановление пароля</h2>
		<div>
			Чтобы сбросить пароль, заполните эту форму: <a href="{{ URL::to('password/reset', array($token)) }}">{{ URL::to('password/reset', array($token)) }}</a><br/>
			Срок действия ссылки истекает через {{ Config::get('auth.reminder.expire', 60) }} минут.
		</div>
	</body>
</html>