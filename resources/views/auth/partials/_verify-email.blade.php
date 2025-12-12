<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    <h3 class="text-lg">Спасибо за регистрацию!</h3>
    <p class="mt-2">Прежде чем начать, подтвердите свой адрес электронной почты, нажав на ссылку, которую мы только что отправили вам по электронной почте?</p>
    <p class="mt-2">Если вы не получили письмо, мы с радостью отправим вам другое.</p>
</div>

<div class="mt-4">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
            <x-primary-button>
                Повторно отправить письмо с подтверждением
            </x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            Выйти
        </button>
    </form>
</div>
