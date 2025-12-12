<form method="POST" action="{{ route('password.store') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="mb-4" id="email-block">
        <label class="font-semibold" for="email">Email Address:</label>
        <input id="email" type="email" name="email" value="{{old('email', $request->email)}}" class="@error('email') border-red-400 @enderror mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="name@example.com">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mb-4" id="password-block">
        <label class="font-semibold" for="password">Password:</label>
        <input id="password" type="password" name="password" class="@error('password') border-red-400 @enderror mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Password:">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="mb-4">
        <label class="font-semibold" for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Password:">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="mb-4 text-right">
        <input type="submit" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md" value="Сбросить пароль">
    </div>
</form>
