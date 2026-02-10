<form method="POST" action="{{route('admin.orders.ajax.delivery-update', $order)}}" data-modules="deliveryUpdate" accept-charset="UTF-8" class="space-y-4">
{{--    @csrf--}}
{{--    @method('patch')--}}
    <input type="hidden" name="delivery[method]" value="{{$delivery->id}}">

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
        <div class="grid gap-5">
            @if($delivery->isMailed())
                <x-admin.forms.input
                    name="customer[name]"
                    title='Фамилия Имя Отчество (Необходимо для почтовой формы)'
                    value="{{ old('customer.name', $order->customer['name']) }}"
                    requared=' <span class="text-red-400">*</span>'
                />
                <x-admin.forms.input
                    name="delivery[index]"
                    title='Индекс Вашей почты'
                    value="{{ old('delivery.index', $order->delivery['index']) }}"
                    requared=' <span class="text-red-400">*</span>'
                />
            @else
                <x-admin.forms.input
                    name="customer[name]"
                    title='Имя'
                    value="{{ old('customer.name', $order->customer['name']) }}"
                    requared=' <span class="text-red-400">*</span>'
                />
            @endif
            @if(!$delivery->isPickup())
                <x-admin.forms.input
                    name="delivery[address]"
                    title='Адрес'
                    value="{{ old('delivery.address', $order->delivery['address']) }}"
                    requared=' <span class="text-red-400">*</span>'
                />
            @endif
        </div>

        <div class="grid gap-5">
            <x-admin.forms.input
                name="customer[email]"
                title='Ваш Email - адрес'
                value="{{ old('customer.email', $order->customer['email']) }}"
                requared=' <span class="text-red-400">*</span>'
            />

            <x-admin.forms.input
                name="customer[phone]"
                title='Либо Телефон'
                value="{{ old('customer.phone', formatPhone($order->customer['phone'])) }}"
                requared=' <span class="text-red-400">*</span>'
            />

            <x-admin.forms.input
                name="customer[other_phone]"
                title="Дополнительный Телефон"
                value="{{ old('customer.other_phone', isset($order->customer['other_phone']) ? formatPhone($order->customer['other_phone']) : '') }}"
            />
        </div>
    </div>
    <x-admin.forms.button text="Сохранить"/>
</form>
