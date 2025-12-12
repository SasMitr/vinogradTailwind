<td class="border-b">{{$product->id}}</td>
<td class="border-b">
    <div class="text-wrap">{{$product->name}}</div>
</td>
<td class="border-b"><div class="text-wrap">{{$product->category->name}}</div></td>
<td class="border-b" style="padding: 5px;" id="product_{{$product->id}}">
    @include('admin.shop.product._modification-input-item', ['product' => $product])
</td>
<td class="border-b" style="padding: 0; margin: 0; width: 105px;">
    <img src="{{asset($product->getImage('100x100'))}}">
</td>
<td class="border-b" style="padding: 0;">
    @include('admin.shop.product.partials._index-action-links')
</td>

