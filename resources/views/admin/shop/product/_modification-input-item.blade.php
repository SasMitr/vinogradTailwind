<div class="flex" id="modification_block_{{$product->id}}">
    <div x-data="{mod_current: null}" class="w-80 border divide-y">
    @foreach ($product->adminModifications as $modification)
        <div class="px-2 py-1">
            <button type="button" class="w-full flex items-center text-gray" :class="{'text-blue-400' : mod_current === {{$loop->iteration}}}" x-on:click="mod_current === {{$loop->iteration}} ? mod_current = null : mod_current = {{$loop->iteration}}">
                <div>
                    {{$modification->property->name}}:
                    <span class="text-red-400">{{$modification->quantity}}</span>/
                    <span class="text-red-400">{{$modification->in_stock}}</span> шт -
                    <span class="text-red-400">{{$modification->price}}</span> руб
                </div>
                <div class="ml-auto" :class="{'rotate-180' : mod_current === {{$loop->iteration}}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                        <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                    </svg>
                </div>
            </button>
            <div x-show="mod_current === {{$loop->iteration}}" x-collapse="" style="height: 0px; overflow: hidden; display: none;" hidden="">
                <div class="p-4 text-lightgray text-sm font-normal border-t">
                    <form class="space-y-1 update-for-product" action="{{route('admin.modification.update.for.product', ['modification_id' => $modification->id])}}" method="POST">
{{--                        <input type="hidden" name="modification_id" value="{{$modification->id}}">--}}
                        @csrf
                        <label class="flex">
                            <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
                                <span>Цена</span>
                            </div>
                            <input name="price" value="{{$modification->price}}" class="h-7 form-input rounded-none border-gray-300" type="number">
                            <div class="flex items-center justify-center border-l-0 border border-gray-300 bg-gray-100 px-3.5">
                                <span>руб</span>
                            </div>
                        </label>

                        <label class="flex">
                            <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
                                <span class="text-nowrap">коррекция <strong>( + / - )</strong></span>
                            </div>
                            <input name="correct" class="h-7 form-input rounded-none border-gray-300" type="number">
                            <div class="flex items-center justify-center border-l-0 border border-gray-300 bg-gray-100 px-3.5">
                                <span>шт</span>
                            </div>
                        </label>

                        <button type="submit" class="update-modification p-2 border text-blue-400 border-blue-300 transition-all duration-300 hover:bg-blue-300 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <polyline points="23 4 23 10 17 10" />
                                <polyline points="1 20 1 14 7 14" />
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
                            </svg>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
    </div>

    <a href="{{route('admin.modification.create.for.product.show', ['product_id' => $product->id])}}" type="button" data-product-id="{{$product->id}}" class="open-modal flex items-center p-2 border text-green-400 border-green-300 transition-all duration-300 hover:bg-green-300 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <line x1="12" x2="12" y1="5" y2="19" />
            <line x1="5" x2="19" y1="12" y2="12" />
        </svg>
    </a>
</div>

