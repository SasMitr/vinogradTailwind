<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    <p>Забыли пароль? Нет проблем.</p>
    <p class="mb-3">Просто сообщите нам свой адрес электронной почты, и мы вышлем вам ссылку для сброса пароля, которая позволит вам выбрать новый.</p>
</div>

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="grid grid-cols-1">
        <div class="mb-4">
            <label class="font-semibold" for="email">Email адрес:</label>
            <input name="email" value="{{old('email')}}" id="email" type="email" class="@error('email') border-red-400 @enderror mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input type="submit" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md w-full" value="Отправить">
        </div>

        <div class="text-center">
            <span class="text-slate-400 me-2">Вспомнил пароль ? </span><a href="{{route('login')}}" class="text-black dark:text-white font-bold inline-block">Войти</a>
        </div>
    </div>
</form>
