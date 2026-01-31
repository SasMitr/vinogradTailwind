<div id="modal" class="fixed hidden z-50 insert-0 bg-black/30 backdrop-blur-md overflow-y-auto h-full w-full top-0">
    <div class="relative max-h-full top-24 mx-auto">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  bg-white">
            <h3 id="modal-header" class="text-xl text-center font-semibold text-gray-900"></h3>
            <button id="ok-btn" type="button"
                    class="text-orange-500 bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="static-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div id="modal-body" class="p-4 bg-white"></div>
        {{--            <!-- Modal footer -->--}}
        {{--            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">--}}
        {{--                <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I accept</button>--}}
        {{--                <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>--}}
        {{--            </div>--}}
    </div>
</div>
