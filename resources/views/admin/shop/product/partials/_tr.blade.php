<td class="border-b border-b-gray-300">{{$product->id}}</td>
<td class="border-b border-b-gray-300">
    <div class="text-wrap">{{$product->name}}</div>
</td>
<td class="border-b border-b-gray-300"><div class="text-wrap">{{$product->category->name}}</div></td>
<td class="border-b border-b-gray-300" id="product_{{$product->id}}">
    @include('admin.shop.product._modification-input-item', ['product' => $product])
</td>
<td class="border-b border-b-gray-300 p-1" style="margin: 0; width: 105px;">
    <img src="{{asset($product->getImage('100x100'))}}">
</td>
<td class="border-b border-b-gray-300 p-1">
    @include('admin.shop.product.partials._index-action-links')
</td>

