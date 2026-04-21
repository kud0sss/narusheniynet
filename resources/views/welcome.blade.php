<x-guest-layout>
    {{-- Обязательное подключение стилей --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="min-h-[85vh] flex flex-col justify-between">
        
        <header class="flex justify-between items-center w-full py-6 border-b border-gray-100">
            <div class="whitespace-nowrap">
                <span class="text-3xl font-black uppercase tracking-tighter">
                    <span class="text-[#dc2626]">НАРУШЕНИЙ</span><span class="text-black">.</span><span class="text-[#2563eb]">НЕТ</span>
                </span>
            </div>

            <div class="flex items-center gap-8">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-gray-700 hover:text-[#2563eb] uppercase tracking-widest">Панель управления</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-[#2563eb] uppercase tracking-widest">Войти</a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-[#2563eb] text-white px-8 py-3 rounded-xl font-bold uppercase text-xs tracking-widest hover:bg-black transition shadow-lg">
                                Регистрация
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

        <main class="flex-grow flex items-center">
            <div class="w-full">
                <h1 class="text-6xl md:text-8xl font-black text-slate-900 leading-[1.1] uppercase">
                    Сделаем дороги <br>
                    <span class="text-[#2563eb]">безопаснее</span>
                </h1>
                
                <p class="mt-8 text-2xl text-slate-500 max-w-2xl leading-relaxed font-medium">
                    Официальная информационная система мониторинга <br> 
                    и фиксации правонарушений ПДД.
                </p>
            </div>
        </main>

        <footer class="py-10 border-t border-gray-100 flex justify-between items-center">
            <div class="text-gray-400 text-sm font-medium uppercase tracking-widest">
                © 2026 Нарушений.нет — Все права защищены
            </div>
            
            <div class="flex gap-8 font-black uppercase text-[11px] tracking-[0.3em]">
                <span class="text-[#dc2626]">Скорость</span>
                <span class="text-black">Закон</span>
                <span class="text-[#2563eb]">Порядок</span>
            </div>
        </footer>

    </div>
</x-guest-layout>