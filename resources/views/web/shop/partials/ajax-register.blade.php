 <form method="POST" action="{{ route('register') }}" class="text-start lg:py-10 py-8">
     @csrf
    <div class="grid grid-cols-1">
        <div class="mb-4">
            <label class="font-semibold" for="RegisterName">Your Name:</label>
            <input id="RegisterName" type="text" name="name" value="{{old('name')}}" class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Harry">
        </div>

        <div class="mb-4">
            <label class="font-semibold" for="LoginEmail">Email Address:</label>
            <input id="LoginEmail" type="email" name="email" value="{{old('email')}}" class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="name@example.com">
        </div>

        <div class="mb-4">
            <label class="font-semibold" for="LoginPassword">Password:</label>
            <input id="LoginPassword" type="password" name="password" class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Password:">
        </div>

        <div class="mb-4">
            <label class="font-semibold" for="password_confirmation">Confirm Password:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Password:">
        </div>

        <div class="mb-4 text-right">
            <input type="submit" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-orange-500 text-white rounded-md" value="Отправить">
        </div>
    </div>
</form>
