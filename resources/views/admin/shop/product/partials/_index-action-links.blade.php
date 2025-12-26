<div class="flex flex-nowrap p-1 gap-1" id="nav">
    <div class="flex items-center gap-x-3">
        <label for="toggle-{{$product->id}}" class="relative inline-block w-11 h-6 cursor-pointer">
            <input type="checkbox" id="toggle-{{$product->id}}" class="toggle-status peer sr-only" @checked($product->status) data-url="{{route('admin.product.toggle.status', ['product_id' => $product->id])}}" >
            <span class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-green-600 peer-disabled:opacity-50 peer-disabled:pointer-events-none"></span>
            <span class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-xs transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
        </label>
    </div>
{{--    open-modal--}}
    <a href="{{route('admin.product.update.show', $product)}}" class="open-modal text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 font-medium text-sm px-2 py-2 inline-flex items-center">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9.57342 2.71915L10.1913 2.10123C11.2151 1.07742 12.8751 1.07742 13.8989 2.10123C14.9227 3.12503 14.9227 4.78494 13.8989 5.80874L13.2809 6.42666M9.57342 2.71915C9.57342 2.71915 9.65066 4.03223 10.8093 5.19082C11.9679 6.34942 13.2809 6.42666 13.2809 6.42666M9.57342 2.71915L3.89259 8.39997C3.50782 8.78475 3.31543 8.97714 3.14997 9.18926C2.9548 9.4395 2.78746 9.71025 2.65094 9.99672C2.5352 10.2396 2.44916 10.4977 2.27708 11.0139L1.54791 13.2014M13.2809 6.42666L7.60011 12.1075C7.21533 12.4923 7.02295 12.6847 6.81082 12.8501C6.56059 13.0453 6.28984 13.2126 6.00336 13.3491C5.7605 13.4649 5.50239 13.5509 4.98616 13.723L2.79865 14.4522M2.79865 14.4522L2.26393 14.6304C2.00989 14.7151 1.72981 14.649 1.54046 14.4596C1.35111 14.2703 1.28499 13.9902 1.36967 13.7361L1.54791 13.2014M2.79865 14.4522L1.54791 13.2014"
                stroke="currentColor" stroke-width="1.6"></path>
        </svg>
    </a>

    <a href="{{route('shop.product', $product)}}"
        @class([
            'text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 font-medium text-sm px-2 py-2 inline-flex items-center',
            'hidden' => !$product->status
        ])
        role="button"
        id="open-link-{{$product->id}}"
        target="_blank"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon"
             fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </a>
</div>




