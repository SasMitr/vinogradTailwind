<div class="overflow-auto mt-5">
    <table class="min-w-[640px] border-b-2 border-gray-100">
        <thead>
        <tr class="text-left">
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена за шт.</th>
            <th class="text-end">Всего</th>
        </tr>
        </thead>
        <tbody class="text-gray invoice-table">
        @foreach ($items as $item)
            @php $item->setRelation('order', $order) @endphp
            <tr class="{{$item->availability < 0 ? 'bg-red-50' : ''}}">
                <td>
                    <strong>{{$item->product_name}}</strong><br>
                    {{$item->modification_name}}
                </td>
                <td>
                    @if (!$order->isCompleted())
                    <div class="quantity-order-item flex justify-start">
                        <div class="flex text-gray-500 font-normal">
                            <button type="submit" class="minus-item p-2 transition-all duration-300 hover:bg-blue-50 cursor-pointer border border-r-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>

                            <input class="quantity-order-input pl-2 w-15 border border-gray-300" value="{{$item->quantity}}"  data-url="{{route('admin.orders.ajax.order_item_update', $order)}}" data-item_id="{{$item->id}}" />

                            <button type="submit" class="plus-item p-2 transition-all duration-300 hover:bg-blue-50 cursor-pointer border border-l-0 border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>

                            </button>
                        </div>
                        <button type="button" class="remove-item ml-2 p-2 text-red-300 transition-all duration-300 hover:bg-red-50 cursor-pointer border border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    @else
                        {{$item->quantity}} шт
                    @endif
                </td>
                <td>{{$item->price}}</td>
                <td>{{$item->getCost()}}</td>
            </tr>
        @endforeach
        <tr class="border-t border-gray-300">
            <th><h5>Общее колличество</h5></th>
            <td>
                @foreach ($quantityByModifications as $name => $value)
                    <p>{{$name}}: <strong>{{$value}}</strong> шт</p>
                @endforeach
            </td>
            <td></td>
            <td>
                @if (!$order->isCompleted())
                <a href="{{route('admin.orders.ajax.order_item_add_form', $order)}}" class="open-modal inline-block p-2.5 text-sky-500 transition-all duration-300 hover:text-white hover:bg-sky-500 bg-sky-50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </a>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="space-y-4 mt-5">
    <div class="flex items-center justify-between font-semibold">
        <p>Стоимость</p>
        <p>{{$order->cost}}</p>
    </div>
    <div id="delivery-data" class="flex items-center justify-between font-semibold p-4 mx-[-20] border-b border-t border-gray-100 bg-gray-50">
        @include('admin.shop.order.partials.delivery_data')
    </div>
    <div class="flex items-center justify-between font-semibold">
        <p>Итоговая стоимость:</p>
        <p id="order-total-cost">{{$order->getTotalCost()}}</p>
    </div>
</div>
<div class="w-full h-[2px] my-5 bg-gray/10"></div>
<div class="flex sm:flex-row flex-col items-start gap-5 flex-wrap print:hidden">
    <div class="flex-1">
        <button type="button"
                class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">
            Cancel
        </button>
    </div>
    <div class="flex-1 max-w-[358px] flex justify-end items-center gap-2.5 flex-wrap">
        <button type="button"
                class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">
            Save as Draft
        </button>
        <button type="button"
                class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
            Send
        </button>
    </div>
</div>
