@extends('web.layouts.base')

{{--@section('title')--}}
{{--    @if($category)--}}
{{--        {{$category->title}} - описание, фото, черенки и саженцы, купить в Минске, Беларусь.{{$page ? ' Страница - ' . $page : ''}}--}}
{{--    @else--}}
{{--        Черенки и саженцы винограда купить в Минске, Беларусь. Полный каталог сортов.{{$page ? ' Страница - ' . $page : ''}}--}}
{{--    @endif--}}
{{--@endsection--}}
{{--@section('key', $category ? $category->meta_key : 'виноград, черенки и саженцы, купить в Минске, Беларусь')--}}
{{--@section('desc')--}}
{{--    @if($category)--}}
{{--        {{$category->meta_desc}}{{$page ? ' Страница - ' . $page : ''}}--}}
{{--    @else--}}
{{--        Черенки и саженцы винограда купить в Минске, Беларусь. Полный каталог сортов.{{$page ? ' Страница - ' . $page : ''}}--}}
{{--    @endif--}}
{{--@endsection--}}

{{--@section('head')--}}
{{--    @if($category)--}}
{{--        <link rel="canonical" href="{{route('vinograd.category.' . $category->category_field, ['slug' => $category->slug])}}" />--}}
{{--    @else--}}
{{--        <link rel="canonical" href="{{route('vinograd.category')}}" />--}}
{{--    @endif--}}
{{--@endsection--}}

@section('content')
        <div class="md:flex justify-between items-center mb-6">
            <span class="font-semibold">Showing 1-16 of 40 items</span>

            <div class="md:flex items-center">
                <label class="font-semibold md:me-2">Sort by:</label>
                <select class="form-select form-input md:w-36 w-full md:mt-0 mt-1 py-2 px-3 h-10 bg-transparent rounded outline-none border border-gray-100 focus:ring-0">
                    <option value="">Featured</option>
                    <option value="">Sale</option>
                    <option value="">Alfa A-Z</option>
                    <option value="">Alfa Z-A</option>
                    <option value="">Price Low-High</option>
                    <option value="">Price High-Low</option>
                </select>
            </div>
        </div>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
            @foreach($products as $product)
            <div class="group border hover:shadow-lg duration-500">
                <div class="my-3 text-center">
                    <a href="{{route('shop.product', $product)}}" class="hover:text-orange-500 text-lg font-medium">{{$product->name}}</a>
                </div>
                <div class="relative overflow-hidden">
                    <img src="{{asset($product->getImage('500x650'))}}" class="group-hover:scale-110 duration-500" alt="{{$product->name}}">

                    <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                        <li><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart size-4"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                        <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye size-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                        <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark size-4"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></a></li>
                    </ul>

                    <ul class="list-none absolute top-[10px] start-4">
                        <li><a href="javascript:void(0)" class="bg-orange-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded h-5">-40% Off</a></li>
                    </ul>
                </div>

                <div class="mt-4 px-2 divide-y">
                    @forelse($product->modifications as $modification)
                    <div class="flex justify-between items-center py-1">
                        <div class="ms-4">
                            <p>{{$modification->property->name}}</p>
                            <p><span class="text-orange-400">{{currency($modification->price)}}</span> {{signature()}}</p>
                        </div>
                        <div>
                            <a href="#" class="size-10 inline-flex items-center justify-center duration-500 hover:bg-orange-400 text-orange-400 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @empty
                        <span class="text-red-400">Нет в наличии</span>
                    @endforelse
                </div>
            </div><!--end content-->
            @endforeach
        </div><!--end grid-->

        {{$products->withQueryString()->onEachSide(1)->links('web.partials.pagination')}}
@endsection
