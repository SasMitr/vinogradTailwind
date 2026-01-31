<div class="grid grid-cols-3 gap-2">
    <x-admin.forms.input
        name="track_code"
        title='Трек код'
        value="{{ old('track_code', $order->track_code) }}"
        requared=' <span class="text-red-400">*</span>'
        class="col-span-2"
    />
    <button type="submit"
            data-url="{{route('admin.orders.ajax.status-treck-code', $order)}}"
            class="send-trek-kode p-2 h-10 my-auto border text-blue-400 border-blue-300 transition-all duration-300 hover:bg-blue-300 hover:text-white">
        Отправить
    </button>
</div>
