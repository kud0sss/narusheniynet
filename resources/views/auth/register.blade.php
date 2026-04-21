<x-guest-layout>
    <div class="px-8 py-10 bg-white border border-slate-200 shadow-xl rounded-3xl">
        <div class="flex justify-center mb-8">
            <a href="/">
                <x-application-logo class="w-auto h-12 fill-current text-blue-600" />
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    {{-- Заменил surname на lastname --}}
                    <x-input-label for="lastname" :value="__('Фамилия')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="lastname" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="text" name="lastname" :value="old('lastname')" required autofocus />
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Имя')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="name" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="text" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    {{-- Заменил patronymic на middlename --}}
                    <x-input-label for="middlename" :value="__('Отчество')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="middlename" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="text" name="middlename" :value="old('middlename')" required />
                    <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
                </div>
            </div>

            <div class="space-y-4 mt-4">
                <div>
                    <x-input-label for="login" :value="__('Логин')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="login" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="text" name="login" :value="old('login')" required />
                    <x-input-error :messages="$errors->get('login')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="tel" :value="__('Телефон')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input 
                        id="tel" 
                        class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" 
                        type="tel" 
                        name="tel" 
                        :value="old('tel')" 
                        required 
                        x-data 
                        x-mask="+7(999)999-99-99" 
                        placeholder="+7(___)___-__-__"
                    />
                    <x-input-error :messages="$errors->get('tel')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Почта')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="email" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="space-y-4 mt-4">
                <div>
                    <x-input-label for="password" :value="__('Пароль')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="password" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Подтверждение пароля')" class="text-xs uppercase tracking-widest font-bold text-slate-500" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="password" name="password_confirmation" required />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="mt-10">
                <x-primary-button class="w-full justify-center py-4 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-sm font-bold uppercase tracking-widest transition rounded-xl shadow-lg shadow-blue-100">
                    {{ __('Создать аккаунт') }}
                </x-primary-button>
            </div>

            <div class="mt-6 text-center text-sm text-slate-500">
                Уже есть профиль? <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:text-blue-700 transition">Войти</a>
            </div>
        </form>
    </div>
</x-guest-layout>