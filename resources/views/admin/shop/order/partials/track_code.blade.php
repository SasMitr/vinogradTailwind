<div class="bg-white track-code-block">
    <div class="border-t border-b border-gray-300 p-5">
        <h3>Трек номер</h3>
    </div>
    <div
        @class([
            'border-b border-gray-300 p-5 text-gray-500 font-normal',
            'track_code' => !$order->isCompleted()
        ])
        id="track_code-block cursor-pointer"
        data-url="{{route('admin.orders.ajax.treck-code', $order)}}"
    >
        {{$order->track_code}}
    </div>
</div>
