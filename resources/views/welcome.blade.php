<x-guest-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="py-16">
        <div class="max-w-[1400px] mx-auto px-8">
            <div class="flex flex-col lg:flex-row items-start justify-between gap-16">
                
                <div class="w-full lg:w-2/3">

                    <h1 class="text-5xl md:text-7xl font-black text-slate-900 leading-[1.0] mb-8 uppercase">
                        СДЕЛАЕМ ДОРОГИ <br>
                        <span class="text-[#2563eb]">БЕЗОПАСНЕЕ</span>
                    </h1>

                    <p class="text-2xl text-slate-500 mb-12 max-w-2xl leading-relaxed">
                        Официальный портал фиксации нарушений ПДД. 
                        Вместе мы сделаем наши улицы лучше.
                    </p>

                    <div class="flex flex-wrap items-center gap-6 mt-10">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-10 py-5 bg-black text-white text-xl font-bold rounded-2xl hover:bg-[#2563eb] transition shadow-xl">
                                    ЛИЧНЫЙ КАБИНЕТ
                                </a>
                            @else
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-10 py-5 bg-[#2563eb] text-white text-xl font-black rounded-2xl hover:bg-black transition-all shadow-2xl shadow-blue-200 uppercase tracking-wide">
                                        РЕГИСТРАЦИЯ
                                    </a>
                                @endif

                                <a href="{{ route('login') }}" class="px-8 py-5 text-xl font-bold text-slate-700 hover:text-[#2563eb] transition uppercase">
                                    ВОЙТИ
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>

                <div class="hidden lg:block lg:w-1/3"></div>

            </div>
        </div>
        
        <div class="max-w-[1400px] mx-auto px-8 mt-24 pt-10 border-t border-slate-100 flex justify-between items-center text-slate-400 font-medium uppercase text-xs tracking-widest">
            <div>© 2026 ИС Нарушений.нет</div>
        </div>
    </div>
</x-guest-layout>