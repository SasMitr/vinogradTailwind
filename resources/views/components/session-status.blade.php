@props(['status'])

@if ($status)
    <section class="relative table w-full pt-20 pb-5 bg-gray-50">
        <div class="container">
            <div {{ $attributes->merge(['class' => 'font-medium text-green-600 bg-green-50 border border-green-600']) }}>
                {{ $status }}
            </div>
        </div>
    </section>
@endif
