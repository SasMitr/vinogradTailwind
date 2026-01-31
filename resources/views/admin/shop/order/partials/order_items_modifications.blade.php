@if($product->adminModifications)
    @foreach($product->adminModifications as $modification)
        {{--                                    @dd($modification, $order->items)--}}
        <div class="content-center">{{$modification->property->name}}</div>
        <div class="content-center">В наличии: <strong>{{$modification->quantity}}</strong> шт x {{$modification->price}}</div>
        <div>
            @if($modification->quantity > 0)
                <div class="flex">
                    <input class="pl-2 w-15 border border-gray-300" value="1" type="number" data-modification_id="{{$modification->id}}">

                    <button type="submit" class="add-item-order p-2 transition-all duration-300 hover:bg-blue-50 cursor-pointer border border-l-0 border-gray-300">
                        {!! $order->isInCart($modification) ? '<span class="text-red-600">Заказан ' . $order->isInCart($modification) . ' шт</span>' : 'Добавить' !!}
                    </button>
                </div>
            @elseif($order->isInCart($modification))
                <span class="text-red-600">Заказан {{ $order->isInCart($modification)  }} шт</span>
            @endif
        </div>
    @endforeach

@else
    <p class="text-red-600">Нет в наличии</p>
@endif
