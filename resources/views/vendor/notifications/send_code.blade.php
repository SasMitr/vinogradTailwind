@component('mail::message')
# Ваш заказ №{{$order->id}} на сайте {{ config('app.name') }} отправлен

@component('mail::panel')
Трек код посылки:
<h3>{{$order->track_code}}</h3>
{{--<p>Отслеживать посылку по трек коду можно <a href="https://webservices.belpost.by/searchRu/{{$code}}" rel="nofollow">ЗДЕСЬ</a></p>--}}
{{--<p>Отслеживать посылку по трек коду можно <a href="https://belpost.by/Otsleditotpravleniye?number={{$code}}" rel="nofollow">ЗДЕСЬ</a></p>--}}
<h3>Отслеживание:</h3>
<p>Обычная почта <a href="{{config('main.tracking_post')}}{{$order->track_code}}" rel="nofollow">ЗДЕСЬ</a></p>
<p>Boxberry <a href="https://boxberry.ru/tracking-page" rel="nofollow">ЗДЕСЬ</a></p>
@endcomponent

@component('mail::table')
| Название                                                                             | Кол-во                  | Цена за шт        |  Стоимость                               |
| :------------------------------------------------------------------------------------|------------------------:| -----------------:| ----------------------------------------:|
@foreach($order->items as $item)
| {{$item->product->name}}<br><small>{{$item->modification->property->name}} </small>  | {{$item->quantity}} шт. | {{$item->price}}  | {{$item->getCost()}}                     |
@endforeach
| <hr>                                                                                 |<hr>                     |<hr>               |<hr>                                      |
| <strong>Итого:</strong>                                                              |                         |                   |{{$order->cost}}                          |
@isset($order->delivery['weight'])
| <strong>Вес заказа:</strong>                                                         |                         |                   |{{$order->delivery['weight'] / 1000}} кг. |
@endisset
| <strong>Стоимость доставки:</strong>                                                 |                         |                   |{{$order->getDeliveryCost()}}             |
| <strong>Сумма к оплате:</strong>                                                     |                         |                   |{{$order->getTotalCost()}}                |
@endcomponent

{{--@component('mail::button', ['url' => route('vinograd.category'), 'color' => 'green'])--}}
{{--Все сорта винограда на нашем участке--}}
{{--@endcomponent--}}

Спасибо, что выбрали нас.<br>
{{--С уважением <a href="{{route('vinograd.home')}}">{{ config('app.name') }}</a>--}}
@endcomponent
