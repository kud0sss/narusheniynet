<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight uppercase">
            Главная страница
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-200">
                <div class="p-10 text-center">
                    <h1 class="text-4xl font-black text-slate-900 mb-4 uppercase tracking-tighter">
                        Система учета заявлений
                    </h1>
                    <p class="text-slate-600 text-lg max-w-2xl mx-auto mb-10">
                        Удобный сервис для подачи и отслеживания ваших обращений в режиме реального времени.
                    </p>
                    
                    <div class="flex flex-wrap justify-center gap-4">
                        @auth
                            <a href="{{ route('reports.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-lg active:scale-95 uppercase text-sm tracking-widest">
                                Мои заявления
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-lg active:scale-95 uppercase text-sm tracking-widest">
                                Войти в систему
                            </a>
                            <a href="{{ route('register') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-900 px-8 py-3.5 rounded-xl font-bold transition-all active:scale-95 uppercase text-sm tracking-widest border border-slate-200">
                                Регистрация
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>