<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight uppercase">
                {{ Auth::user()->role === 'admin' ? 'Все заявления' : 'Мои заявления' }}
            </h2>
            @if(Auth::user()->role !== 'admin')
                <a href="{{ route('reports.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-all shadow-sm shrink-0">
                    НОВОЕ ЗАЯВЛЕНИЕ
                </a>
            @endif
        </div>
    </x-slot>

    <div class="mb-8 bg-white p-4 rounded-2xl border border-slate-200 flex flex-wrap gap-4 items-center justify-between">
        <form method="GET" action="{{ route('reports.index') }}" class="flex flex-wrap gap-4 items-center">
            <div class="flex items-center gap-2">
                <label class="text-[10px] font-black text-slate-400 uppercase">Сортировка:</label>
                <select name="sort" onchange="this.form.submit()" class="text-xs font-bold bg-slate-50 border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 py-1.5 transition-all outline-none">
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Сначала новые</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Сначала старые</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <label class="text-[10px] font-black text-slate-400 uppercase">Статус:</label>
                <select name="status" onchange="this.form.submit()" class="text-xs font-bold bg-slate-50 border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 py-1.5 transition-all outline-none">
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Новое</option>
                    <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Подтверждено</option>
                    <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Отклонено</option>
                </select>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($reports as $report)
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between h-full group">
                <div>
                    <div class="flex justify-between items-start mb-5">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-slate-400">
                                {{ $report->created_at->format('d.m.Y') }}
                            </span>
                            <span class="text-xs font-medium text-slate-300">
                                {{ $report->created_at->format('H:i') }}
                            </span>
                        </div>
                        
                        <span class="px-3 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wider
                            {{ $report->status_id == 1 ? 'bg-blue-50 text-blue-600' : '' }}
                            {{ $report->status_id == 3 ? 'bg-green-50 text-green-600' : '' }}
                            {{ $report->status_id == 2 ? 'bg-red-50 text-red-600' : '' }}">
                            {{ $report->status->name ?? 'Новое' }}
                        </span>
                    </div>

                    <h3 class="text-lg font-extrabold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">
                        {{ $report->number }}
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-4">
                        {{ $report->description }}
                    </p>
                </div>

                <div class="flex items-center justify-end pt-4 border-t border-slate-100 gap-2 mt-auto">
                    <a href="{{ route('reports.edit', $report) }}" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 transition-all active:scale-95">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    
                    <form action="{{ route('reports.destroy', $report) }}" method="POST" onsubmit="return confirm('Вы уверены?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-600 transition-all active:scale-95">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-2xl border border-dashed border-slate-300">
                <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">Нет данных для отображения</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10 mb-6">
        {{ $reports->links() }}
    </div>
</x-app-layout>