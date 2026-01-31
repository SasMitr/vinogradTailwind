
    <div class="profile inline-block" x-data="dropdown" @click.outside="open = false">
        <button type="button" class="flex items-center gap-2.5 cursor-pointer" @click="toggle()">
            <div class="text-start">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">Стоимость доставки:</span>
                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.29241 5.20759C0.901881 4.81707 0.90188 4.18391 1.29241 3.79338C1.68293 3.40286 2.31609 3.40286 2.70662 3.79338L5.99951 7.08627L9.2924 3.79338C9.68293 3.40286 10.3161 3.40286 10.7066 3.79338C11.0971 4.18391 11.0971 4.81707 10.7066 5.20759L6.70662 9.2076C6.31609 9.59812 5.68293 9.59812 5.2924 9.2076L1.29241 5.20759Z" fill="currentColor"></path>
                    </svg>
                </div>
                <span class="ml-5 text-sm text-gray-500 font-normal">{{$order->delivery['method_name']}}</span><br>
                @isset($order->delivery['weight'])
                    <span class="ml-5 text-sm text-gray-500 font-normal">Вес- {{$order->delivery['weight'] / 1000}} кг.</span>
                @endisset
            </div>
        </button>
        <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="min-w-80 shadow-md" style="display: none;">
            @foreach(deliverysArray() as $key => $name)
                <li @class(
                    [
                        'p-4',
                        'bg-sky-50 text-sky-500' => $key == $order->delivery['method_id']
                    ])
                >
                    <a href="{{route('admin.orders.ajax.delivery-form', ['delivery' => $key, 'order' => $order])}}" class="open-modal">{{$name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <p>{{$order->getDeliveryCost()}}</p>
