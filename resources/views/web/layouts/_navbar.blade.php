<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky tagline-height">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="{{route('shop.home')}}">
            <div>
                <img src="{{Storage::url('pics/img/logo/logo_vinograd.png')}}" class="h-[50px] inline-block" alt="">
                {{--                <img src="{{asset('images/logo-dark.png')}}" class="h-[22px] inline-block" alt="">--}}
            </div>
        </a>
        <!-- End Logo container-->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle">
                    {{--                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">--}}
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Mobile Toggle -->

        <!--Login button Start-->
        <ul class="buy-button list-none mb-0">
            <li class="dropdown inline-block relative pe-1">
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle align-middle inline-flex" type="button">
                    <i data-feather="search" class="size-5"></i>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdown-menu absolute overflow-hidden end-0 m-0 mt-5 z-10 md:w-52 w-48 rounded-md bg-white shadow hidden"
                    onclick="event.stopPropagation();">
                    <div class="relative">
                        <i data-feather="search" class="absolute size-4 top-[9px] end-3"></i>
                        <input type="text"
                               class="h-9 px-3 pe-10 w-full border-0 focus:ring-0 outline-none bg-white shadow"
                               name="s" id="searchItem" placeholder="Search...">
                    </div>
                </div>
            </li>

            <li class="dropdown inline-block relative ps-0.5">
                <button data-dropdown-toggle="dropdown"
                        class="dropdown-toggle size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-orange-500 border border-orange-500 text-white"
                        type="button">
                    <i data-feather="shopping-cart" class="h-4 w-4"></i>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-64 rounded-md bg-white shadow hidden"
                    onclick="event.stopPropagation();">
                    <ul class="py-3 text-start" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="index.html#" class="flex items-center justify-between py-1.5 px-4">
                                        <span class="flex items-center">
                                            <img src="{{asset('images/shop/trendy-shirt.jpg')}}"
                                                 class="rounded shadow w-9" alt="">
                                            <span class="ms-3">
                                                <span class="block font-semibold">T-shirt (M)</span>
                                                <span class="block text-sm text-slate-400">$320 X 2</span>
                                            </span>
                                        </span>

                                <span class="font-semibold">$640</span>
                            </a>
                        </li>

                        <li>
                            <a href="index.html#" class="flex items-center justify-between py-1.5 px-4">
                                        <span class="flex items-center">
                                            <img src="{{asset('images/shop/luxurious-bag2.jpg')}}"
                                                 class="rounded shadow w-9" alt="">
                                            <span class="ms-3">
                                                <span class="block font-semibold">Bag</span>
                                                <span class="block text-sm text-slate-400">$50 X 5</span>
                                            </span>
                                        </span>

                                <span class="font-semibold">$250</span>
                            </a>
                        </li>

                        <li>
                            <a href="index.html#" class="flex items-center justify-between py-1.5 px-4">
                                        <span class="flex items-center">
                                            <img src="{{asset('images/shop/apple-smart-watch.jpg')}}"
                                                 class="rounded shadow w-9" alt="">
                                            <span class="ms-3">
                                                <span class="block font-semibold">Watch (Men)</span>
                                                <span class="block text-sm text-slate-400">$800 X 1</span>
                                            </span>
                                        </span>

                                <span class="font-semibold">$800</span>
                            </a>
                        </li>

                        <li class="border-t border-gray-100 my-2"></li>

                        <li class="flex items-center justify-between py-1.5 px-4">
                            <h6 class="font-semibold mb-0">Total($):</h6>
                            <h6 class="font-semibold mb-0">$1690</h6>
                        </li>

                        <li class="py-1.5 px-4">
                                    <span class="text-center block">
                                        <a href="javascript:void(0)"
                                           class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center rounded-md bg-orange-500 border border-orange-500 text-white">View Cart</a>
                                        <a href="javascript:void(0)"
                                           class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center rounded-md bg-orange-500 border border-orange-500 text-white">Checkout</a>
                                    </span>
                            <p class="text-sm text-slate-400 mt-1">*T&C Apply</p>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="inline-block ps-0.5">
                <a href="javascript:void(0)"
                   class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-orange-500 text-white">
                    <i data-feather="heart" class="h-4 w-4"></i>
                </a>
            </li>

            <li class="dropdown inline-block relative ps-0.5">
                <button data-dropdown-toggle="dropdown" class="dropdown-toggle items-center" type="button">
                    <a href="javascript:void(0)" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-orange-500 text-white">
                        @auth
                            <img src="{{asset('images/client/16.jpg')}}" class="rounded-full" alt="">
                        @endauth
                        @guest
                            <i data-feather="user" class="h-4 w-4"></i>
                        @endguest
                    </a>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdown-menu absolute end-0 m-0 mt-4 z-10 w-48 rounded-md overflow-hidden bg-white hidden"
                    onclick="event.stopPropagation();">
                    <ul class="py-2 text-start">
                        @guest()
                            <li>
                                <a href="javascript:void(0)" data-url="{{route('login')}}" class="open-modal-btn flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                    <i data-feather="log-in" class="h-4 w-4 me-2"></i>
                                    Войти
                                </a>
                            </li>
                            <li class="border-t border-gray-100 my-2"></li>
                            <li>
                                <a href="javascript:void(0)"  data-url="{{route('register')}}" class="open-modal-btn flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                    <i data-feather="user-plus" class="h-4 w-4 me-2"></i>
                                    Регистрация
                                </a>
                            </li>
                        @endguest
                        @auth()
                            <li>
                                <p class="text-slate-400 pt-2 px-4">{{ Auth::user()->name }}</p>
                            </li>
                            @admin
                                <li class="border-t border-gray-100 my-2"></li>
                                <a href="{{route('admin.dashboard.index')}}" class="flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                    <i data-feather="user" class="h-4 w-4 me-2"></i>
                                    Админка
                                </a>
                            @endadmin
                            <li class="border-t border-gray-100 my-2"></li>
                            <li>
                                <a href="{{route('cabinet.dashboard')}}" class="flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                    <i data-feather="user" class="h-4 w-4 me-2"></i>
                                    Кабинет
                                </a>
                            </li>
                            <li>
                                <a href="helpcenter.html" class="flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                    <i data-feather="help-circle" class="h-4 w-4 me-2"></i>
                                    Helpcenter
                                </a>
                            </li>
                            <li>
                                <a href="user-setting.html" class="flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                    <i data-feather="settings" class="h-4 w-4 me-2"></i>
                                    Settings
                                </a>
                            </li>
                            <li class="border-t border-gray-100 my-2"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center font-medium py-2 px-4 hover:text-orange-500">
                                        <i data-feather="log-out" class="h-4 w-4 me-2"></i>
                                        Logout
                                    </a>
                                </form>
                            </li>

                        @endauth
                    </ul>
                </div>
            </li><!--end dropdown-->
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Доставка и оплата</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="index.html" class="sub-menu-item">Fashion One</a></li>
                        <li><a href="index-fashion-two.html" class="sub-menu-item">Fashion Two</a></li>
                        <li><a href="index-fashion-three.html" class="sub-menu-item">Fashion Three</a></li>
                        <li><a href="index-fashion-four.html" class="sub-menu-item">Fashion Four</a></li>
                    </ul>
                </li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="{{route('shop.category')}}">Каталог</a><span class="menu-arrow"></span>
                    {{--                    <a href="javascript:void(0)">Каталог</a><span class="menu-arrow"></span>--}}
                    <ul class="submenu">
                        <li><a href="index.html" class="sub-menu-item">Fashion One</a></li>
                        <li><a href="index-fashion-two.html" class="sub-menu-item">Fashion Two</a></li>
                        <li><a href="index-fashion-three.html" class="sub-menu-item">Fashion Three</a></li>
                        <li><a href="index-fashion-four.html" class="sub-menu-item">Fashion Four</a></li>
                    </ul>

                </li>
                <li><a href="sale.html" class="sub-menu-item">Прайс</a></li>

                <li><a href="contact.html" class="sub-menu-item">Блог</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->
