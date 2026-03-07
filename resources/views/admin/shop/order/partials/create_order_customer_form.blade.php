<form method="POST" action="{{route('admin.orders.ajax.create-order', ['status' => $status])}}" data-modules="createOrder" accept-charset="UTF-8" class="space-y-4">
    <x-admin.forms.input
        name="customer[name]"
        title='Имя'
        value="{{ old('customer.name') }}"
        requared=' <span class="text-red-400">*</span>'
    />
    <x-admin.forms.input
        name="customer[email]"
        title='Email'
        value="{{ old('customer.email') }}"
        requared=' <span class="text-red-400">*</span>'
    />

    <x-admin.forms.input
        name="customer[phone]"
        title='Телефон'
        value="{{ old('customer.phone') }}"
        requared=' <span class="text-red-400">*</span>'
    />

    <x-admin.forms.input
        name="customer[other_phone]"
        title="Дополнительный Телефон"
        value="{{ old('customer.other_phone') }}"
    />
    <x-admin.forms.button text="Сохранить"/>
</form>
