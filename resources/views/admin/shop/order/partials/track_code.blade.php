<div class="bg-white track-code-block">
    <div class="border-t border-b border-gray-300 p-5">
        <h3>Трек номер</h3>
    </div>
    <div class="track_code border-b border-gray-300 p-5 cursor-pointer text-gray-500 font-normal" id="track_code-block" data-url="{{route('admin.orders.ajax.treck-code', $order)}}">
        {{$order->track_code}}
    </div>
</div>
