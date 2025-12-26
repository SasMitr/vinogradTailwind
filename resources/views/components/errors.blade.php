@if ($errors->any())
    <section class="relative table w-full pt-20 pb-5 bg-gray-50">
        <div class="container">
            <div class="rounded p-3 bg-red-200 text-red-900 border border-red-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
