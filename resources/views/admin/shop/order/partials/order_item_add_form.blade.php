<form method="POST" action="{{route('admin.orders.ajax.order_item_add', $order)}}" data-modules="addItemOrder" accept-charset="UTF-8" class="space-y-4">
    <div class="overflow-auto bg-white border border-gray-300">
        <table class="text-gray-500 font-normal" id="myTable">
            <thead>
            <tr class="text-left">
                <th class="border-b border-gray-300">Название</th>
                <th class="border-b border-gray-300">Категория</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr class="border-b border-gray-300">
                    <td class="content-center"><a href="{{route('shop.product', $product)}}" target="_blank">{{$product->name}}</a></td>
                    <td class="modifications-bloc grid grid-cols-3 gap-2" id="row_{{$product->id}}">
                        @include('admin.shop.order.partials.order_items_modifications')
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

    </div>

</form>
