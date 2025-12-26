@extends('web.layouts.base')

@section('content')
{{--        <div class="lg:col-span-9 md:col-span-8">--}}
            <h1 class="text-2xl text-center font-semibold p-5">{{ $product->name }}</h1>
            <div class="grid md:grid-cols-5 grid-cols-1 gap-6 items-center">

                <div class="col-span-3">

                    <ul class="product-imgs flex list-none items-center">
                        @if($product->getGallery('500x650'))
                        <li>
                            <ul class="img-select list-none">
                                <li class="p-px">
                                    <a href="#" data-id="1">
                                        <img src="{{asset($product->getImage('500x650'))}}" class="shadow" alt="">
                                    </a>
                                </li>

                                @foreach($product->getGallery('500x650') as $image)
                                    @break($loop->iteration > 4)
                                    <li class="p-px">
                                        <a href="#" data-id="{{$loop->iteration + 1}}">
                                            <img src="{{Storage::url($image)}}" alt="{{ $product->name }}" class="shadow">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="img-display shadow m-px">
                            <div class="img-showcase flex w-full duration-500" style="transform: translateX(0px);">
                                <img src="{{asset($product->getImage('500x650'))}}" class="min-w-full" alt="shoe image">
                                @foreach($product->getGallery('500x650') as $image)
                                    @break($loop->iteration > 4)
                                    <img src="{{Storage::url($image)}}" alt="{{ $product->name }}" class="min-w-full">
                                @endforeach
                            </div>
                        </li>
                        @else
                            <li class="img-display shadow m-px">
                                <div class="img-showcase flex w-full duration-500" style="transform: translateX(0px);">
                                    <img src="{{asset($product->getImage('500x650'))}}" class="min-w-full" alt="shoe image">
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <div  class="col-span-2">
                    <div class="mt-4">
{{--                        <ul class="border">--}}
{{--                            <li class="flex justify-between p-2">--}}
{{--                                <span class="font-semibold">Срок созревания:</span>--}}
{{--                                <span class="text-slate-400">{{$product->category::getRipeningName($product->ripening)}} дней</span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Масса грозди:</span>--}}
{{--                                <span class="text-slate-400">{{ $product->props['mass'] }} г</span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Окраска:</span>--}}
{{--                                <span class="text-slate-400">{{ $product->props['color'] }}</span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Вкус:</span>--}}
{{--                                <span class="text-slate-400">{{ $product->props['flavor'] }}</span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Устойчивость к морозу:</span>--}}
{{--                                <span class="text-slate-400">{{ $product->props['frost'] }} &#8451;</span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Цветок:</span>--}}
{{--                                <span class="text-slate-400">{{ $product->props['flower'] }}</span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Категория:</span>--}}
{{--                                <span class="text-slate-400"><a href="#"> {{$product->category->name}}</a></span>--}}
{{--                            </li>--}}
{{--                            <li class="flex justify-between p-2 border-t">--}}
{{--                                <span class="font-semibold">Селекция:</span>--}}
{{--                                <span class="text-slate-400">--}}
{{--                                    @if($product->selection->id > 1)--}}
{{--                                        <a href="#"> {{$product->selection->name}}</a>,--}}
{{--                                    @endif--}}
{{--                                    @if($product->country->id > 1)--}}
{{--                                        <a href="#"> {{$product->country->name}}</a>--}}
{{--                                    @endif--}}
{{--                                </span>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <ul class="border divide-y">
                            @forelse($product->modifications as $modification)
                            <li class="flex items-center justify-between p-2">
                                <span class="text-sm">
                                    <span class="font-semibold">{{$modification->property->name}}: </span>
                                    <span class="text-base">{{currency($modification->price)}}</span>
                                    <span>{{signature()}}</span>
                                </span>
                                <form action="?" class="add-to-cart" method="post">
                                    <div class="flex">
                                        <input type="number" name="quantity" value="1" class="w-16 border-gray-200">
                                        <button type="button" class="items-center border border-orange-400 text-orange-400 hover:bg-orange-400 hover:text-white px-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <circle cx="9" cy="21" r="1" /><circle cx="20" cy="21" r="1" /><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </li>
                            @empty
                                <li><span class="text-red-400">Нет в наличии</span></li>
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div><!--end grid-->

            <div class="mt-20 border text-sm sm:text-base">
                <ul class="flex flex-row items-stretch" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li role="presentation" class="basis-1/3">
                        <button class="px-4 py-2 text-center font-semibold w-full duration-500 text-orange-500 border-b-0" id="description-tab" data-tabs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
                            Описа&shy;ние
                        </button>
                    </li>
                    <li role="presentation" class="basis-1/3">
                        <button class="border-l px-4 py-2 text-center font-semibold w-full duration-500 hover:text-orange-500" id="addinfo-tab" data-tabs-target="#addinfo" type="button" role="tab" aria-controls="addinfo" aria-selected="false">
                            Характе&shy;ристики
                        </button>
                    </li>
                    <li role="presentation" class="basis-1/3">
                        <button class="border-l px-4 py-2 text-center font-semibold w-full duration-500 hover:text-orange-500" id="review-tab" data-tabs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">
                            Отзы&shy;вы (0)
                        </button>
                    </li>
                </ul>

                <div id="myTabContent" class="p-5">
                    <div class="hidden product-content" id="description" role="tabpanel" aria-labelledby="profile-tab">

                        @if($contents)
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 my-6 border-b">
                                <div class="">
                                    <h5 class="text-xl pt-5 text-center font-medium">Содержание:</h5>
                                    <ul class="divide-y">
                                        @foreach($contents as $key => $value)
                                        <li class="p-2">
                                            <a href="#{{$key}}" class="navbar-link text-slate-400 flex items-center py-2 rounded hover:text-orange-400">
{{--                                                <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay size-4"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></span>--}}
                                                <h6 class="mb-0 font-medium">{{$value}}</h6>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="">
                                    <h2>Реклама</h2>
{{--                                    @include('components.reklama.yandex_blog_post_list')--}}
                                </div>
                            </div>
                        @endif

                        <h2 class="text-2xl my-6 text-center">Виноград {{$product->name}} описание и характеристики сорта</h2>
                        {!! $product->content !!}
                    </div>

                    <div class="hidden" id="addinfo" role="tabpanel" aria-labelledby="addinfo-tab">
                        <table class="w-full">
                            <tbody>
                            <tr class="bg-white">
                                <td class="font-semibold pb-4">Срок созревания:</td>
                                <td class="text-slate-400 pb-4">{{$product->category::getRipeningName($product->ripening)}} дней</td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold py-4">Масса грозди:</td>
                                <td class="text-slate-400 py-4">{{ $product->props['mass'] }} г</td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold pt-4">Окраска:</td>
                                <td class="text-slate-400 pt-4">{{ $product->props['color'] }}</td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold pt-4">Вкус:</td>
                                <td class="text-slate-400 pt-4">{{ $product->props['flavor'] }}</td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold pt-4">Устойчивость к морозу:</td>
                                <td class="text-slate-400 pt-4">{{ $product->props['frost'] }}</td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold pt-4">Цветок:</td>
                                <td class="text-slate-400 pt-4">{{ $product->props['flower'] }}</td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold pt-4">Категория:</td>
                                <td class="text-slate-400 pt-4"><a href="#"> {{$product->category->name}}</a></td>
                            </tr>

                            <tr class="bg-white border-t border-gray-100">
                                <td class="font-semibold pt-4">Селекция:</td>
                                <td class="text-slate-400 pt-4">
                                    @if($product->selection->id > 1)
                                        <a href="#"> {{$product->selection->name}}</a>,
                                    @endif
                                    @if($product->country->id > 1)
                                        <a href="#"> {{$product->country->name}}</a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="" id="review" role="tabpanel" aria-labelledby="review-tab">

                        <a href="#" class="py-2 mb-10 inline-block font-semibold tracking-wide align-middle duration-500 text-center bg-orange-500 text-white w-full">
                            Оставить отзыв
                        </a>

                        <div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://tailwind/images/client/16.jpg" class="h-11 w-11 rounded-full shadow" alt="">

                                    <div class="ms-3 flex-1">
                                        <a href="product-detail-two.html" class="text-lg font-semibold hover:text-orange-500 duration-500">Calvin Carlo</a>
                                        <p class="text-sm text-slate-400">6th May 2022 at 01:25 pm</p>
                                    </div>
                                </div>

                                <a href="product-detail-two.html" class="text-slate-400 hover:text-orange-500 duration-500 ms-5"><i class="mdi mdi-reply"></i> Reply</a>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-md shadow mt-6">
                                <ul class="list-none inline-block text-orange-400">
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline text-slate-400 font-semibold">5.0</li>
                                </ul>

                                <p class="text-slate-400 italic">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://tailwind/images/client/16.jpg" class="h-11 w-11 rounded-full shadow" alt="">

                                    <div class="ms-3 flex-1">
                                        <a href="product-detail-two.html" class="text-lg font-semibold hover:text-orange-500 duration-500">Calvin Carlo</a>
                                        <p class="text-sm text-slate-400">6th May 2022 at 01:25 pm</p>
                                    </div>
                                </div>

                                <a href="product-detail-two.html" class="text-slate-400 hover:text-orange-500 duration-500 ms-5"><i class="mdi mdi-reply"></i> Reply</a>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-md shadow mt-6">
                                <ul class="list-none inline-block text-orange-400">
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline text-slate-400 font-semibold">5.0</li>
                                </ul>

                                <p class="text-slate-400 italic">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://tailwind/images/client/16.jpg" class="h-11 w-11 rounded-full shadow" alt="">

                                    <div class="ms-3 flex-1">
                                        <a href="product-detail-two.html" class="text-lg font-semibold hover:text-orange-500 duration-500">Calvin Carlo</a>
                                        <p class="text-sm text-slate-400">6th May 2022 at 01:25 pm</p>
                                    </div>
                                </div>

                                <a href="product-detail-two.html" class="text-slate-400 hover:text-orange-500 duration-500 ms-5"><i class="mdi mdi-reply"></i> Reply</a>
                            </div>
                            <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                                <ul class="list-none inline-block text-orange-400">
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline text-slate-400 font-semibold">5.0</li>
                                </ul>

                                <p class="text-slate-400 italic">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://tailwind/images/client/16.jpg" class="h-11 w-11 rounded-full shadow" alt="">

                                    <div class="ms-3 flex-1">
                                        <a href="product-detail-two.html" class="text-lg font-semibold hover:text-orange-500 duration-500">Calvin Carlo</a>
                                        <p class="text-sm text-slate-400">6th May 2022 at 01:25 pm</p>
                                    </div>
                                </div>

                                <a href="product-detail-two.html" class="text-slate-400 hover:text-orange-500 duration-500 ms-5"><i class="mdi mdi-reply"></i> Reply</a>
                            </div>
                            <div class="p-4 bg-gray-50 dark:bg-slate-800 rounded-md shadow dark:shadow-gray-800 mt-6">
                                <ul class="list-none inline-block text-orange-400">
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                                    <li class="inline text-slate-400 font-semibold">5.0</li>
                                </ul>

                                <p class="text-slate-400 italic">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                            </div>
                        </div>

                        <div class="p-6 rounded-md shadow mt-8">
                            <h5 class="text-lg font-semibold">Leave A Comment:</h5>

                            <form class="mt-8">
                                <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="lg:col-span-6 mb-5">
                                        <div class="text-start">
                                            <label for="name" class="font-semibold">Your Name:</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4 absolute top-3 start-4"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input name="name" id="name" type="text" class="ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Name :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-6 mb-5">
                                        <div class="text-start">
                                            <label for="email" class="font-semibold">Your Email:</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-4 h-4 absolute top-3 start-4"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                <input name="email" id="email" type="email" class="ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1">
                                    <div class="mb-5">
                                        <div class="text-start">
                                            <label for="comments" class="font-semibold">Your Comment:</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle w-4 h-4 absolute top-3 start-4"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                                <textarea name="comments" id="comments" class="ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Message :"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md w-full">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
{{--        </div><!--end container-->--}}
@endsection

@section('script')
    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage(){
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    </script>
@endsection
