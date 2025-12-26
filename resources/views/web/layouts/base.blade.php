<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <meta content="@yield('desc')" name="description">
    <meta content="@yield('key')" name="keywords">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('head')

    <link rel="shortcut icon" type="image/x-icon" href="{{Storage::url('pics/img/logo/vinograd-favicon.ico')}}">
    <link rel="shortcut icon" type="image/svg+xml" href="{{Storage::url('pics/img/logo/logo.svg')}}">

    {{--    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">--}}
    {{--    <link rel="shortcut icon" href="{{Storage::url('pics/img/logo/logo.svg')}}">--}}
    @if (file_exists(public_path('build/web/manifest.json')) || file_exists(public_path('hot')))
            {{ Vite::useBuildDirectory('/build/web') }}
            @vite(['resources/web/css/app.css', 'resources/web/js/app.js'])
        @else
        @endif

</head>

<body class="dark:bg-slate-900">
<!-- Loader Start -->
{{--<div id="preloader">--}}
{{--    <div id="status">--}}
{{--        <div class="spinner">--}}
{{--            <div class="double-bounce1"></div>--}}
{{--            <div class="double-bounce2"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Loader End -->
<!-- TAGLINE START-->
<div class="tagline bg-slate-900">
    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="text-center">
                <h6 class="text-white font-medium">Refer a friend & get $50 in credits each 🎉</h6>
            </div>
        </div>
    </div><!--end container-->
</div><!--end tagline-->
<!-- TAGLINE END-->

@include('web.layouts._navbar')


<section class="relative table w-full pt-20 pb-5 bg-gray-50">
    <div class="container relative">
        {{--            <div class="grid grid-cols-1 mt-14">--}}
        {{--                <h3 class="text-3xl leading-normal font-semibold">Fashion</h3>--}}
        {{--            </div><!--end grid-->--}}

        <div class="relative mt-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out hover:text-orange-500">
                    <a href="index.html">Cartzio</a>
                </li>
                <li class="inline-block text-base text-slate-950 dark:text-white mx-0.5 ltr:rotate-0 rtl:rotate-180" style="margin-bottom: -1px;">
                    <i data-feather="chevron-right" class="size-3"></i>
                </li>
                <li class="inline-block uppercase text-[13px] font-bold text-orange-500" aria-current="page">Shop Grid</li>
            </ul>
        </div>
    </div><!--end container-->
</section>

<x-session-status class="p-4" :status="session('status')" />
{{--@include('components.status')--}}
@include('components.errors')

@yield('home-header')

<section class="relative py-10">
    <div class="container relative">
        <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-6">
{{--        <div class="grid md:grid-cols-12 sm:grid-cols-2 grid-cols-1 gap-6">--}}

            <div class="lg:col-span-9 md:col-span-8">
                @yield('content')
            </div>

            <div class="lg:order-first lg:col-span-3 md:col-span-4">
                <div class="rounded shadow p-4 sticky top-20">
                    <h5 class="text-xl font-medium">Filter</h5>

                    <form class="mt-4">
                        <div>
                            <label for="searchname" class="font-medium">Search:</label>
                            <div class="relative mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search absolute size-4 top-[9px] end-4"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                <input type="text" class="h-9 pe-10 rounded px-3 bg-white border border-gray-100 focus:ring-0 outline-none" name="s" id="searchItem" placeholder="Search...">
                            </div>
                        </div>
                    </form>

                    <div class="mt-4">
                        <h5 class="font-medium">Colors:</h5>
                        <ul class="list-none mt-2">
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-red-600 inline-flex align-middle" title="Red"></a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-indigo-600 inline-flex align-middle" title="Blue"></a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-emerald-600 inline-flex align-middle" title="Green"></a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-slate-900 inline-flex align-middle" title="Black"></a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-gray-400 inline-flex align-middle" title="Gray"></a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-orange-600 inline-flex align-middle" title="Orange"></a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-6 rounded-full ring-2 ring-gray-200 dark:ring-slate-800 bg-violet-600 inline-flex align-middle" title="Purple"></a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h5 class="font-medium">Brands:</h5>
                        <ul class="list-none mt-2">
                            <li>
                                <a href="shop-grid-left-sidebar.html" class="text-slate-400 dark:text-gray-100 flex">
                                    <i data-feather="disc" class="mdi mdi-shopping-outline text-orange-500 me-2 mt-1 size-3"></i>Alexander McQueen
                                </a>
                            </li>
                            <li>
                                <a href="shop-grid-left-sidebar.html" class="text-slate-400 dark:text-gray-100 flex">
                                    <i data-feather="disc" class="mdi mdi-shopping-outline text-orange-500 me-2 mt-1 size-3"></i>Alexander Wang
                                </a>
                            </li>
                            <li><a href="shop-grid-left-sidebar.html" class="text-slate-400 dark:text-gray-100"><i class="mdi mdi-shopping-outline text-orange-500 me-2"></i>Allegra K</a></li>
                            <li><a href="shop-grid-left-sidebar.html" class="text-slate-400 dark:text-gray-100"><i class="mdi mdi-shopping-outline text-orange-500 me-2"></i>AllSaints</a></li>
                            <li><a href="shop-grid-left-sidebar.html" class="text-slate-400 dark:text-gray-100"><i class="mdi mdi-shopping-outline text-orange-500 me-2"></i>Badgley Mischka</a></li>
                            <li><a href="shop-grid-left-sidebar.html" class="text-slate-400 dark:text-gray-100"><i class="mdi mdi-shopping-outline text-orange-500 me-2"></i>Baldinini</a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h5 class="font-medium">Sizes:</h5>
                        <ul class="list-none mt-2">
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">S</a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">M</a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">L</a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="size-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">XL</a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="w-10 h-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">2XL</a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="w-10 h-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">3XL</a></li>
                            <li class="inline"><a href="shop-grid-left-sidebar.html" class="w-10 h-7 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-gray-50 hover:border-slate-900 dark:hover:border-gray-100 hover:text-white dark:hover:text-slate-900 hover:bg-slate-900 dark:hover:bg-slate-100">4XL</a></li>
                        </ul>
                    </div>
                </div>
            </div><!--end col-->



        </div><!--end grid-->
    </div><!--end container-->
</section>

<!-- Footer Start -->
<footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">
    <div class="container relative">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                        <div class="lg:col-span-3 md:col-span-12">
                            <a href="index.html#" class="text-[22px] focus:outline-none">
                                <img src="{{asset('images/logo-light.png')}}" alt="">
                            </a>
                            <p class="mt-6 text-gray-300">Upgrade your style with our curated sets. Choose confidence,
                                embrace your unique look.</p>
                            <ul class="list-none mt-6">
                                <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank"
                                                      class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:text-orange-500 dark:hover:text-orange-500 text-slate-300"><i
                                            data-feather="dribbble" class="h-4 w-4 align-middle"
                                            title="dribbble"></i></a></li>
                                <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank"
                                                      class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:text-orange-500 dark:hover:text-orange-500 text-slate-300"><i
                                            data-feather="linkedin" class="h-4 w-4 align-middle"
                                            title="Linkedin"></i></a></li>
                                <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                                      class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:text-orange-500 dark:hover:text-orange-500 text-slate-300"><i
                                            data-feather="facebook" class="h-4 w-4 align-middle"
                                            title="facebook"></i></a></li>
                                <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                                      class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:text-orange-500 dark:hover:text-orange-500 text-slate-300"><i
                                            data-feather="instagram" class="h-4 w-4 align-middle" title="instagram"></i></a>
                                </li>
                                <li class="inline"><a href="https://x.com/shreethemes" target="_blank"
                                                      class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:text-orange-500 dark:hover:text-orange-500 text-slate-300"><i
                                            data-feather="twitter" class="h-4 w-4 align-middle" title="twitter"></i></a>
                                </li>
                                <li class="inline"><a href="mailto:support@shreethemes.in"
                                                      class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-slate-800 rounded-md hover:text-orange-500 dark:hover:text-orange-500 text-slate-300"><i
                                            data-feather="mail" class="h-4 w-4 align-middle" title="email"></i></a></li>
                            </ul><!--end icon-->
                        </div><!--end col-->

                        <div class="lg:col-span-6 md:col-span-12">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Shopping & Clothes</h5>

                            <div class="grid md:grid-cols-12 grid-cols-1">
                                <div class="md:col-span-4">
                                    <ul class="list-none footer-list mt-6">
                                        <li><a href="index.html"
                                               class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Men</a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Jackets & Coats </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Jeans </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Loungewear </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Polo shirts </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Shirts</a></li>
                                    </ul>
                                </div><!--end col-->

                                <div class="md:col-span-4">
                                    <ul class="list-none footer-list mt-6">
                                        <li><a href="index.html"
                                               class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Shorts </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Suits Swimwear </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> T-shirts </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Tracksuits </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Trousers</a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Shirts</a></li>
                                    </ul>
                                </div><!--end col-->

                                <div class="md:col-span-4">
                                    <ul class="list-none footer-list mt-6">
                                        <li><a href="index.html"
                                               class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> My account </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Order History </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Wish List </a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Newsletter</a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Affiliate</a></li>
                                        <li class="mt-[10px]"><a href="index.html"
                                                                 class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                    class="mdi mdi-chevron-right"></i> Returns</a></li>
                                    </ul>
                                </div><!--end col-->
                            </div>
                        </div>

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                            <p class="mt-6">Sign up and receive the latest tips via email.</p>
                            <form>
                                <div class="grid grid-cols-1">
                                    <div class="my-3">
                                        <label class="form-label">Write your email <span
                                                class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                            <input type="email"
                                                   class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none"
                                                   placeholder="Email" name="email" required="">
                                        </div>
                                    </div>

                                    <button type="submit" id="submitsubscribe" name="send"
                                            class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md">
                                        Subscribe
                                    </button>
                                </div>
                            </form>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end col-->
            </div>
        </div><!--end grid-->

        <div class="grid grid-cols-1">
            <div class="py-[30px] px-0 border-t border-slate-800">
                <div class="grid lg:grid-cols-4 md:grid-cols-2">
                    <div class="flex items-center lg:justify-center">
                        <i class="mdi mdi-truck-check-outline align-middle text-lg mb-0 me-2"></i>
                        <h6 class="mb-0 font-medium">Free delivery</h6>
                    </div><!--end content-->

                    <div class="flex items-center lg:justify-center">
                        <i class="mdi mdi-archive align-middle text-lg mb-0 me-2"></i>
                        <h6 class="mb-0 font-medium">Non-contact shipping</h6>
                    </div><!--end content-->

                    <div class="flex items-center lg:justify-center">
                        <i class="mdi mdi-cash-multiple align-middle text-lg mb-0 me-2"></i>
                        <h6 class="mb-0 font-medium">Money-back quarantee</h6>
                    </div><!--end content-->

                    <div class="flex items-center lg:justify-center">
                        <i class="mdi mdi-shield-check align-middle text-lg mb-0 me-2"></i>
                        <h6 class="mb-0 font-medium">Secure payments</h6>
                    </div><!--end content-->
                </div><!--end grid-->
            </div><!--end-->
        </div><!--end grid-->
    </div><!--end container-->

    <div class="py-[30px] px-0 border-t border-slate-800">
        <div class="container relative text-center">
            <div class="grid md:grid-cols-2 items-center">
                <div class="md:text-start text-center">
                    <p class="mb-0">©
                        <script>document.write(new Date().getFullYear())</script>
                        Cartzio. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="../../index.html"
                                                                                              target="_blank"
                                                                                              class="text-reset">Shreethemes</a>.
                    </p>
                </div>

                <ul class="list-none md:text-end text-center mt-6 md:mt-0">
                    <li class="inline"><a href="index.html"><img src="{{asset('images/payments/american-express.jpg')}}"
                                                                 class="max-h-6 rounded inline" title="American Express"
                                                                 alt=""></a></li>
                    <li class="inline"><a href="index.html"><img src="{{asset('images/payments/discover.jpg')}}"
                                                                 class="max-h-6 rounded inline" title="Discover" alt=""></a>
                    </li>
                    <li class="inline"><a href="index.html"><img src="{{asset('images/payments/mastercard.jpg')}}"
                                                                 class="max-h-6 rounded inline" title="Master Card"
                                                                 alt=""></a></li>
                    <li class="inline"><a href="index.html"><img src="{{asset('images/payments/paypal.jpg')}}"
                                                                 class="max-h-6 rounded inline" title="Paypal"
                                                                 alt=""></a></li>
                    <li class="inline"><a href="index.html"><img src="{{asset('images/payments/visa.jpg')}}"
                                                                 class="max-h-6 rounded inline" title="Visa" alt=""></a>
                    </li>
                </ul>
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- Footer End -->
@include('web.layouts._modal')

<!-- Back to top -->
<a href="#" id="back-to-top"
   class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-orange-500 text-white justify-center items-center">
    {{--    <i class="mdi mdi-arrow-up"></i>--}}
    <i data-feather="arrow-up" class="size-5"></i>
</a>
<!-- Back to top -->
@yield('script')
</body>
</html>
