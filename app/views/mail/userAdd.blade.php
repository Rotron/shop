<h2>Здравствуйте, {{ $firstname }} {{ $lastname }}!</h2>
<p>Для вас на сайте спутникового оборудования <a href="{{ asset('') }}" target="_blank">ukrtvsat</a></p>
<p>созданы учетные данные</p>
<p>Для входа, перейдите по <a href="{{ asset('admin') }}" target="_blank">ссылке</a>, введите свой login и пароль</p>
<p>Ваш login: <strong>{{ $login }}</strong></p>
<p>Ваш пароль: <strong>{{ $password }}</strong></p>
<h4>Контактная информация:</h4>
<p>Телефон: {{ $setting['phone'] }}</p>
<p>Адрес: {{ $setting['address'] }}</p>
<p>Email: <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a></p>