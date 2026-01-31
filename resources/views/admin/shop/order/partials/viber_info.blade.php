@if(!$order->customer['email'])
<div>
    <h4>Для Вайбера</h4>
    <p>тел: {{$order->customer['phone']}}</p>
    <p>Здравствуйте.</p>
    <p>Ваш заказ отправлен.</p>
    <p>Код отслеживания: {{$order->track_code}}</p>
</div>
@endif
