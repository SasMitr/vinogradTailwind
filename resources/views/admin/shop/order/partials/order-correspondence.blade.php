<div class="bg-white border border-gray-300 overflow-hidden">
    @if($order->correspondences->isNotEmpty())
        @foreach($order->correspondences as $correspondence)
            <div class="px-4 pt-4 text-gray-700">
                {{getRusDate($correspondence->created_at)}}
            </div>
            <div class="space-y-2 p-4 text-gray-600 text-sm font-normal  border-b border-gray-300">
                <p>{!! nl2br($correspondence->message, true) !!}</p>
            </div>
        @endforeach
    @endif
</div>

<div class="send-message-bloc bg-white border border-gray-300">
    @if(!$order->isCompleted())
    <form action="">
        <div class="p-5 border-b border-gray-300">
            <button type="button" class="bg-sky-500 text-white py-2 px-2.5 font-normal cursor-pointer mb-1">
                Реквизиты россии
            </button>
            <button type="button" class="bg-sky-500 text-white py-2 px-2.5 font-normal cursor-pointer mb-1">
                Реквизиты беларусь
            </button>
            <label class="inline-flex items-center mb-1">
                <input name="add_cart" type="checkbox" class="cart-correspondence text-sky-500">
                <span class="text-sm text-gray-600 font-normal ml-2">Добавить корзину</span>
            </label>
        </div>
        <div class="p-5 border-b border-b-gray-300 flex items-center gap-5" id="subject-block">
            <span class="text-sm/none shrink-0 text-gray-600 font-normal">Тема:</span>
            <input name="subject" type="text" placeholder="Тема сообщения" class="subject-correspondence form-control w-full text-sm p-0 !border-none placeholder:text-gray focus:ring-0 bg-transparent" value="Уточнение Вашего заказа на сайте: Vinograd-Minsk" id="subject">
        </div>
        <div class="p-5 border-b border-b-gray-300 flex-1 h-75 overflow-hidden" id="message-block">
            <textarea name="message" class="message-correspondence form-control w-full h-full text-sm p-0 border-none placeholder:text-gray focus:ring-0 bg-transparent" placeholder="Сообщение:" id="message"></textarea>
        </div>
        <div class="p-5 text-right">
            <button type="submit" class="send-message text-gray-600 bg-gray-300 hover:text-sky-500 duration-300 p-2" data-url="{{route('admin.orders.ajax.order_send_message', $order)}}">
                Отправить
            </button>
        </div>
    </form>
    @endif
</div>
