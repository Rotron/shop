<h2>Здравствуйте, {{ $firstname }}!</h2>
<p>Мы рады приветствовать вас в нашем интернет-магазине</p>
<p>спутникового оборудования <a href="{{ asset('') }}" target="_blank">ukrtvsat</a></p>
<p>Для входа, перейдите по <a href="{{ asset('login') }}" target="_blank">ссылке</a>, введите свой логин и пароль</p>
<p>Ваш логин: <strong>{{ $login }}</strong></p>
<p>Ваш пароль: <strong>{{ $password }}</strong></p>
<h4>Контактная информация:</h4>
<p>Телефон: {{ $setting['phone'] }}</p>
<p>Адрес: {{ $setting['address'] }}</p>
<p>Email: <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a></p>