<h3>Здравствуйте</h3>
<p>{{ $item['fullname'] }} отправил новое сообщение через форму контактов сайта <a href="{{ asset('') }}" target="_blank">{{ Config::get('setting.title') }}</a></p>
<p><i>Email отправителя:</i> {{ $item['email'] }}</p>
<p><i>Тема сообщения:</i> {{ $item['theme'] }}</p>
<p><i>Сообщение:</i> {{ $item['message'] }}</p>