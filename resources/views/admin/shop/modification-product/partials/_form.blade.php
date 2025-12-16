<form method="POST" action="{{route('admin.modification-product.create.for.product')}}" data-modules="addModificationForProduct" accept-charset="UTF-8" id="modificAdd">
    @csrf
    @method('patch')
    <input type="hidden" name="product_id" value="{{$product_id}}">
    <div class="space-y-2 p-4 text-sm font-normal">

        <div id="modification_id-block">
            <label class="flex">
                <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
                    <span class="text-nowrap">Модификация</span>
                </div>
                <select class="h-9 text-sm w-full border-gray-300" name="modification_id">
                    <option selected="selected" value="">Выбрать модификацию</option>
                    @foreach($modifications as $modification)
                        <option value="{{$modification->id}}">{{$modification->name}}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div id="price-block">
            <label class="flex">
                <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
                    <span class="text-nowrap">Цена</span>
                </div>
                <input name="price" class="h-9 form-input rounded-none border-gray-300" type="number">
            </label>
        </div>

        <div id="quantity-block">
            <label class="flex">
                <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
                    <span class="text-nowrap">Колличество</span>
                </div>
                <input name="quantity" class="h-9 form-input rounded-none border-gray-300" type="number">
            </label>
        </div>

        <button type="submit" class="p-2 border text-blue-400 border-blue-300 transition-all duration-300 hover:bg-blue-300 hover:text-white">
            Сохранить
        </button>

    </div>
</form>
