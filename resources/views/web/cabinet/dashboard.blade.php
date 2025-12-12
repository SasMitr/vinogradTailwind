@extends('web.layouts.base')

@section('title', 'Кабинет. Главная')
@section('desc', '')
@section('key', '')

@section('content')
{{--    <div class="lg:col-span-9 md:col-span-8">--}}
{{--        <div class="md:container container-fluid relative">--}}
            <div class="relative overflow-hidden md:rounded-md shadow h-52 bg-[url('../../assets/images/hero/pages.jpg')] bg-center bg-no-repeat bg-cover"></div>
{{--        </div><!--end container-->--}}

{{--        <div class="container relative md:mt-24 mt-16">--}}
            <div class="md:flex  mt-16">
                <div class="lg:w-1/4 md:w-1/3 md:px-3">
                    <div class="relative md:-mt-48 -mt-32">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <div class="profile-pic text-center mb-5">
                                <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)">
                                <div>
                                    <div class="relative h-28 w-28 mx-auto">
                                        <img src="{{asset('images/client/16.jpg')}}" class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                        <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="text-lg font-semibold">Jesus Zamora</h5>
                                        <p class="text-slate-400">jesus@hotmail.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 dark:border-gray-700">
                                <ul class="list-none sidebar-nav mb-0 pb-0" id="navmenu-nav">
                                    <li class="navbar-item account-menu">
                                        <a href="user-account.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay size-4"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></span>
                                            <h6 class="mb-0 font-medium">Account</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-billing.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit size-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                                            <h6 class="mb-0 font-medium">Billing Info</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-payment.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card size-4"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></span>
                                            <h6 class="mb-0 font-medium">Payment</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-invoice.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text size-4"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></span>
                                            <h6 class="mb-0 font-medium">Invoice</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-social.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 size-4"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg></span>
                                            <h6 class="mb-0 font-medium">Social Profile</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="user-notification.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell size-4"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></span>
                                            <h6 class="mb-0 font-medium">Notifications</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu active">
                                        <a href="user-setting.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings size-4"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></span>
                                            <h6 class="mb-0 font-medium">Settings</h6>
                                        </a>
                                    </li>

                                    <li class="navbar-item account-menu">
                                        <a href="lock-screen.html" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="me-2 mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out size-4"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg></span>
                                            <h6 class="mb-0 font-medium">Sign Out</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-6 md:mt-0">
                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <h5 class="text-lg font-semibold mb-4">Personal Detail :</h5>
                        <form>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                                <div>
                                    <label class="form-label font-medium">First Name : <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4 absolute top-3 start-4"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <input type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="First Name:" id="firstname" name="name" required="">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Last Name : <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check w-4 h-4 absolute top-3 start-4"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                        <input type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Last Name:" id="lastname" name="name" required="">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Your Email : <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-4 h-4 absolute top-3 start-4"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <input type="email" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email" name="email" required="">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Occupation : </label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark w-4 h-4 absolute top-3 start-4"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                        <input name="name" id="occupation" type="text" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Occupation :">
                                    </div>
                                </div>
                            </div><!--end grid-->

                            <div class="grid grid-cols-1">
                                <div class="mt-5">
                                    <label class="form-label font-medium">Description : </label>
                                    <div class="form-icon relative mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle w-4 h-4 absolute top-3 start-4"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                        <textarea name="comments" id="comments" class="ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Message :"></textarea>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <input type="submit" id="submit" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md mt-5" value="Save Changes">
                        </form><!--end form-->
                    </div>

                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 mt-6">
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <h5 class="text-lg font-semibold mb-4">Contact Info :</h5>

                                <form>
                                    <div class="grid grid-cols-1 gap-5">
                                        <div>
                                            <label class="form-label font-medium">Phone No. :</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone w-4 h-4 absolute top-3 start-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                <input name="number" id="number" type="number" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Phone :">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="form-label font-medium">Website :</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe w-4 h-4 absolute top-3 start-4"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                                <input name="url" id="url" type="url" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Url :">
                                            </div>
                                        </div>
                                    </div><!--end grid-->

                                    <button class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md mt-5">Add</button>
                                </form>
                            </div><!--end col-->

                            <div>
                                <h5 class="text-lg font-semibold mb-4">Change password :</h5>
                                <form>
                                    <div class="grid grid-cols-1 gap-5">
                                        <div>
                                            <label class="form-label font-medium">Old password :</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key w-4 h-4 absolute top-3 start-4"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Old password" required="">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="form-label font-medium">New password :</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key w-4 h-4 absolute top-3 start-4"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="New password" required="">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="form-label font-medium">Re-type New password :</label>
                                            <div class="form-icon relative mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key w-4 h-4 absolute top-3 start-4"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Re-type New password" required="">
                                            </div>
                                        </div>
                                    </div><!--end grid-->

                                    <button class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md mt-5">Save password</button>
                                </form>
                            </div><!--end col-->

                        </div><!--end row-->
                    </div>

                    <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 mt-6">
                        <h5 class="text-lg font-semibold mb-5 text-red-600">Delete Account :</h5>

                        <p class="text-slate-400 mb-4">Do you want to delete the account? Please press below "Delete" button</p>

                        <a href="user-setting.html" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-600 text-white rounded-md">Delete</a>
                    </div>
                </div>
            </div><!--end grid-->
{{--        </div><!--end container-->--}}
{{--    </div>--}}
@endsection
