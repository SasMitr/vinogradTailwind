<form action="{{isset($product) ? route('admin.product.update', $product) : route('admin.product.create')}}"
      data-modules="{{isset($product) ? 'edit' : 'create'}}"
      data-product-id="{{isset($product) ? $product->id : null}}"
      method="POST" enctype="multipart/form-data"
>
    @csrf
    @method('patch')
    <div x-data="{ current: 5 }" class="border border-gray-200 divide-y divide-gray-200">

        <x-admin.shop.product.accordion-item>
            <x-slot:current>1</x-slot>
            <x-slot:title>Заглавное фото</x-slot>

            <div class="lg:col-span-6">
                <img src="{{isset($product) ? asset($product->getImage('400x400')) : Storage::url('pics/img/post_default.png')}}" id="image_preview" width="200">
            </div>
            <div class="lg:col-span-6"  id="image-block">
                <div class="border border-gray-100 p-4 w-36">
                    <label for="image" class="flex flex-col items-center gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-gray-200"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-gray-400 font-medium">Выбрать фото</span>
                    </label>
                    <input id="image" accept="image/*" name="image" type="file" class="hidden"/>
                </div>
                <span>(Размер фото: 600х600 px. Макс. вес - 500Kb)</span>
            </div>
        </x-admin.shop.product.accordion-item>

        <x-admin.shop.product.accordion-item>
            <x-slot:current>2</x-slot>
            <x-slot:title>Название и мета-данные</x-slot>

            <div class="lg:col-span-12">
                @include('admin.shop.product.partials._input-meta', [
                    'name' => 'meta[title]',
                    'value' => old('meta.title', isset($product) ? $product->meta['title'] : ''),
//                    'value' => old('meta.title', $product->meta['title']),
                    'title' => 'Title'
                ])
            </div>

            <div class="lg:col-span-12">
                @include('admin.shop.product.partials._input-meta', [
                    'name' => 'name',
                    'value' => old('name', isset($product) ? $product->name : ''),
//                    'value' => old('name', $product->name),
                    'title' => 'Название'
                ])
            </div>

            @if(isset($product))
                <div class="lg:col-span-12">
                    @include('admin.shop.product.partials._input-meta', [
                        'name' => 'slug',
                        'value' => old('slug', $product->slug),
                        'title' => 'Slug'
                    ])
                </div>
            @endif

            <div class="lg:col-span-6">
                @include('admin.shop.product.partials._textarea-meta', [
                    'name' => 'meta[description]',
                    'value' => old('meta.description', isset($product) ? $product->meta['description'] : ''),
//                    'value' => old('meta.desc', $product->meta['description']),
                    'title' => 'Описание (description)'
                ])
            </div>

            <div class="lg:col-span-6">
                @include('admin.shop.product.partials._textarea-meta', [
                    'name' => 'meta[keywords]',
                    'value' => old('meta.keywords', isset($product) ? $product->meta['keywords'] : ''),
//                    'value' => old('meta.key', $product->meta['keywords']),
                    'title' => 'Ключевые слова (keywords)'
                ])
            </div>
        </x-admin.shop.product.accordion-item>

        <x-admin.shop.product.accordion-item>
            <x-slot:current>3</x-slot>
            <x-slot:title>Категория - характеристики - модификации</x-slot>

            <div class="lg:col-span-4" id="category_id-block">
                @include('admin.shop.product.partials._select-category', [
                    'title' => 'Категория',
                    'name' => 'category_id',
                    'items' => $categorys
                ])
            </div>

            <div class="lg:col-span-4" id="selection_id-block">
                @include('admin.shop.product.partials._select-category', [
                    'title' => 'Селекционер',
                    'name' => 'selection_id',
                    'items' => $selections
                ])
            </div>

            <div class="lg:col-span-4" id="country_id-block">
                @include('admin.shop.product.partials._select-category', [
                    'title' => 'Страна селекции',
                    'name' => 'country_id',
                    'items' => $countrys
                ])
            </div>

            <div class="lg:col-span-6">
                <label class="inline-flex items-center">
                    <input name="is_featured" @checked(old('is_featured', isset($product) ? $product->is_featured : false)) type="checkbox"
                           class="form-checkbox outborder-success">
                    <span class="text-sm">Рекомендовать</span>
                </label>
            </div>
            <div class="lg:col-span-6">
                <label class="inline-flex items-center">
                    <input name="status" @checked(old('status', isset($product) ? !$product->status : false)) type="checkbox"
                           class="form-checkbox outborder-warning">
                    <span class="text-sm">Черновик</span>
                </label>
            </div>

            <div class="lg:col-span-6 border-t" id="ripening-block">
                <h3 class="text-blue-400 p-2">Основные характеристики</h3>
                <label class="flex mb-1">
                    <div
                        class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100 px-3.5">
                        <span class="text-nowrap">Срок созревания (дней)</span>
                    </div>
                    <select class="h-7 py-0 text-sm w-full border-gray-300" name="ripening">
                        <option value="">Выбрать срок созревания</option>
                        @foreach(ripeningProducts() as $id => $name)
                            <option value="{{$id}}" @selected($id == old('ripening', isset($product) ? $product->ripening : false)) >{{$name}}</option>
                        @endforeach
                    </select>
                    <div
                        class="flex items-center justify-center border-l-0 border border-gray-300 bg-gray-100 px-3.5">
                        <span>дней</span>
                    </div>
                </label>

                @include('admin.shop.product.partials._item-props', [
                    'before' => 'Средняя масса грозди',
                    'field' => 'mass',
                    'after' => 'грамм'
                ])

                @include('admin.shop.product.partials._item-props', [
                    'before' => 'Окраска',
                    'field' => 'color',
                    'after' => false
                ])

                @include('admin.shop.product.partials._item-props', [
                    'before' => 'Вкус',
                    'field' => 'flavor',
                    'after' => false
                ])

                @include('admin.shop.product.partials._item-props', [
                    'before' => 'Морозоустойчивость',
                    'field' => 'frost',
                    'after' => '℃'
                ])

                @include('admin.shop.product.partials._item-props', [
                    'before' => 'Цветок',
                    'field' => 'flower',
                    'after' => false
                ])

            </div>

{{--            Будет вложенность форм--}}
{{--            @if(isset($product))--}}
{{--                <div class="lg:col-span-6 border-t">--}}
{{--                    <h3 class="text-blue-400 p-2">Модификации:</h3>--}}
{{--                    @include('admin.shop.product._modification-input-item', ['product' => $product])--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="lg:col-span-12">
                <h3 class="text-blue-400 p-2">Похожие сорта</h3>
                <select class="form-control select2" multiple="multiple" name="props[similar][]"
                        id="choices-multiple-remove-button">
                    <option value="">Выбрать похожие сорта</option>
                    @foreach($products as $id => $name)
                        <option value="{{$id}}" @selected(in_array($id, old('props.similar', (isset($product) && $product->props['similar'] !=null) ? $product->props['similar'] : [])))>{{$name}}</option>
                    @endforeach
                </select>
            </div>
        </x-admin.shop.product.accordion-item>

        <x-admin.shop.product.accordion-item>
            <x-slot:current>4</x-slot>
            <x-slot:title>Галерея</x-slot>

            <div class="lg:col-span-12">

                @if(isset($product))
                    <div class="flex flex-wrap items-center gap-5">
                        @foreach($product->getGallery('100x100') as $image)
                        <div class="relative h-24 w-24">
                            <img src="{{asset(Storage::url($image))}}" class="h-24 w-24 flex-none object-cover">
                            <input name="removeGallery[]" value="{{class_basename($image)}}" data-url="{{route('admin.product.remove.img.gallery')}}" type="checkbox"
                                   class="absolute -bottom-2 -right-2 h-7 w-7 bg-danger ring-2 ring-white">
                        </div>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3 mt-3"  id="gallery_-block">
                    <label for="small-file-input" class="sr-only">Choose file</label>
                    <input multiple type="file" name="gallery[]" id="gallery" class="block w-full border border-gray-200 focus:shadow-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200
                                          file:border-0 file:text-blue-400
                                          file:bg-gray-100 file:me-4
                                          file:py-2 file:px-4">
                </div>

                <div id="multi-preview" class="flex flex-wrap items-center gap-5"></div>
            </div>
        </x-admin.shop.product.accordion-item>

        <x-admin.shop.product.accordion-item>
            <x-slot:current>5</x-slot>
            <x-slot:title>Текст статьи и антонация</x-slot>
            <div class="lg:col-span-12">
                <div class="form-group" id="content-block">
                    <label for="exampleInputEmail1">Полный текст</label>
                    <textarea name="content" id="content" cols="30" rows="10"
                              class="form-control">{{old('content', isset($product) ? $product->content : '')}}</textarea>
                </div>
            </div>
            <div class="lg:col-span-12">
                <div class="form-group" id="description-block">
                    <label for="exampleInputEmail1">Антонация</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                              class="form-control">{{old('description', isset($product) ? $product->description : '')}}</textarea>
                </div>
            </div>
        </x-admin.shop.product.accordion-item>

    </div>

    <button type="submit" class="p-2 mt-5 border text-blue-400 border-blue-300 transition-all duration-300 hover:bg-blue-300 hover:text-white">
        Сохранить
    </button>

</form>
