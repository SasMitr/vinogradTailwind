@if ($paginator->hasPages())

    <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
        <div class="md:col-span-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex items-center -space-x-px">
                    @if (!$paginator->onFirstPage())
                        <li>
                            <a href="{{ preg_replace($pattern, $replace, $paginator->previousPageUrl()) }}" class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-3xl hover:text-white border border-gray-100 dark:border-gray-800 hover:border-orange-500 dark:hover:border-orange-500 hover:bg-orange-500 dark:hover:bg-orange-500" rel="prev" aria-label="@lang('pagination.previous')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left size-5 rtl:rotate-180 rtl:-mt-1"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li>
                                <span class="z-10 size-[40px] inline-flex justify-center items-center border">{{ $element }}</span>
                            </li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li>
                                        <span aria-current="page" class="z-10 size-[40px] inline-flex justify-center items-center text-white bg-orange-500 border border-orange-500">{{ $page }}</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ preg_replace($pattern, $replace, $url) }}" class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:border-orange-500 dark:hover:border-orange-500 hover:bg-orange-500 dark:hover:bg-orange-500">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ preg_replace($pattern, $replace, $paginator->nextPageUrl()) }}" class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-3xl hover:text-white border border-gray-100 dark:border-gray-800 hover:border-orange-500 dark:hover:border-orange-500 hover:bg-orange-500 dark:hover:bg-orange-500" rel="next" aria-label="@lang('pagination.next')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right size-5 rtl:rotate-180 rtl:-mt-1"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div><!--end col-->
    </div><!--end grid-->

@endif
