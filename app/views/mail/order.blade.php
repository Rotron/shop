<h2>Здравствуйте, {{ $user }}!</h2>
<p>Ваша заявка принята.</p>
<p>менеджер компании <a href="{{ asset('') }}" target="_blank">{{ Config::get('setting.company') }}</a> свяжется с Вами в ближайшее время.</p>
<h4>Заказ № {{ $order->id }}</h4>
<p>дата заказа {{ $order->created_at }}</p>

<table style="width: 100%;border: 4px double black;border-collapse: collapse;">
    <thead>
        <tr>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">код товара</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">фото</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">название</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">цена</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Количество</th>
            <th style="text-align: left;background: #ccc;padding: 5px;border: 1px solid black;">Сумма</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cart as $product)
        <tr>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->id }}</td>
            <td style="padding: 5px;border: 1px solid black;"><a href="{{ asset('product') }}/{{ Product::where('id', '=', $product->id)->first()->link }}" target="_blank" style="text-decoration:none"><img src="{{ asset('uploads/images/product') }}/{{ $product->id }}_1_thumb.png" style="border-width:0;display:block;margin:auto"></a></td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->name }}</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->price }} грн.</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->qty }}</td>
            <td style="padding: 5px;border: 1px solid black;">{{ $product->price * $product->qty }} грн.</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3 style="float:right">К оплате: <span>{{ Cart::total() }}</span> грн</h3>
<h4>Ваш комментарий</h4>
<p>{{ $order->comment }}</p>

<h4>Контактная информация</h4>
<p>Телефон: {{ Config::get('setting.phone') }}</p>
<p>Адрес: {{ Config::get('setting.address') }}</p>
<p>Email: <a href="mailto:{{ Config::get('setting.email') }}">{{ Config::get('setting.email') }}</a></p>