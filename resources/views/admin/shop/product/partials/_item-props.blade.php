<label class="flex mb-1">
    <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
        <span class="text-nowrap">{{$before}}</span>
    </div>
    <input name="props[{{$field}}]" type="text" class="h-7 w-full border-gray-300" value="{{old("props.$field", isset($product) ? $product->props[$field] : '')}}">
    @if($after)
        <div class="flex items-center justify-center border-l-0 border border-gray-300 bg-gray-100 px-3.5">
            <span>{{$after}}</span>
        </div>
    @endif
</label>
