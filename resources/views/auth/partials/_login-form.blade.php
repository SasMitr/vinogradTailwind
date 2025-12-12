<form method="POST" action="{{ route('login') }}" data-modules="login" class="text-start lg:py-10 py-8">
    @csrf
    <div class="grid grid-cols-1">
        <div class="mb-4" id="email-block">
            <label class="font-semibold" for="email">Email адрес:</label>
            <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="Ваш Email" class="@error('email') border-red-400 @enderror mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4" id="password-block">
            <label class="font-semibold" for="password">Пароль:</label>
            <input id="password" type="password" name="password" placeholder="Пароль" class="@error('password') border-red-400 @enderror mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <div class="flex items-center mb-0">
                <input  name="remember" type="checkbox" id="remember_me" class="form-checkbox rounded border-gray-100 dark:border-gray-800 text-orange-500 focus:border-orange-300 focus:ring focus:ring-offset-0 focus:ring-orange-200 focus:ring-opacity-50 me-2">
                <label class="form-checkbox-label text-slate-400" for="remember_me">Запомнить</label>
            </div>
        </div>

        <div class="mb-4 text-right">
            <input type="submit" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md" value="Войти">
        </div>

        <div class="text-center">
            @if (Route::has('password.request'))
                <p class="text-slate-400 mb-0">
                    <a href="{{ route('password.request') }}" class="text-slate-400">Забыл пароль ?</a>
                </p>
            @endif
        </div>
    </div>
</form>
