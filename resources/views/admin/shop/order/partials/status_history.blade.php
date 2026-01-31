<ul class="max-w-md text-sm text-gray-500">
    @foreach ($order->statuses_json as $status)
        <li class="py-3">
            <div class="grid grid-cols-2 gap-2">
                <div class="">
                    {!! $order->statuses->name($status['value']) !!}
                </div>
                <div class="font-normal">
                    {{getRusDate($status['created_at'])}}
                </div>
            </div>
        </li>
    @endforeach
</ul>

