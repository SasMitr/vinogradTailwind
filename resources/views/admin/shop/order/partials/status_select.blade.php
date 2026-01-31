@if($order->statuses->allowedTransitions)
    <label class="flex min-w-65 text-gray-500 font-normal">
        <div class="border-r-0 border border-gray-300">
            {!! $order->statuses->name($order->current_status) !!}
        </div>
        <select name="status" class="text-sm px-2 w-full border-gray-300" data-url="{{route('admin.orders.ajax.select_status', $order)}}">
            <option selected disabled hidden value="">Изменить</option>
            @foreach($order->statuses->allowedTransitions as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
        <button type="submit" class="select-status py-2.5 px-3 text-blue-400 transition-all duration-300 hover:bg-blue-300 hover:text-white border-l-0 border border-gray-300 bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                 height="16" class="main-grid-item-icon" fill="none" stroke="currentColor"
                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <polyline points="23 4 23 10 17 10"></polyline>
                <polyline points="1 20 1 14 7 14"></polyline>
                <path
                    d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
            </svg>
        </button>
    </label>

    @if($order->isAllowedDateBuild())
        <label class="flex mt-2 text-gray-500 font-normal">
            <div @class([
                    'flex items-center border border-gray-300 border-r-0 justify-center text-gray-500 px-3.5',
                    'bg-yellow-300' => $order->isDateBuild()
                ])>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                         height="16" class="main-grid-item-icon" fill="none"
                         stroke="currentColor" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2">
                      <rect height="18" rx="2" ry="2" width="18" x="3" y="4"/>
                      <line x1="16" x2="16" y1="2" y2="6"/>
                      <line x1="8" x2="8" y1="2" y2="6"/>
                      <line x1="3" x2="21" y1="10" y2="10"/>
                    </svg>
                </span>
            </div>
            <input value="{{$order->date_build}}" data-url="{{route('admin.orders.ajax.date_build', $order)}}" class="date-build px-2 h-9 w-full border border-gray-300" type="text">
        </label>
    @endif
@else
    {!! $order->statuses->name($order->current_status) !!}
@endif
