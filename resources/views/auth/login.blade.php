<x-guest-layout>
    <div class="px-8 py-10 bg-white border border-slate-200 shadow-xl rounded-3xl">
        <div class="flex justify-center mb-8">
            <a href="/">
                <x-application-logo class="w-auto h-12 fill-current text-blue-600" />
            </a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="login" :value="__('Логин')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                <x-text-input id="login" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('login')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="password" :value="__('Пароль')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                <x-text-input id="password" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                    <span class="ms-2 text-sm text-slate-600">{{ __('Запомнить') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:text-blue-700 font-medium transition" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>

            <div class="mt-8">
                <x-primary-button class="w-full justify-center py-4 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-sm font-bold uppercase tracking-widest transition rounded-xl shadow-lg shadow-blue-100">
                    {{ __('Войти') }}
                </x-primary-button>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">
                    Нет аккаунта? 
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:text-blue-700 transition">
                        Регистрация
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>