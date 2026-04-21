<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight uppercase">
            Редактирование
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200 p-8 mt-6">
        <form method="POST" action="{{ route('reports.update', $report) }}" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Гос. номер автомобиля</label>
                <input type="text" name="number" value="{{ old('number', $report->number) }}" required
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Описание нарушения</label>
                <textarea name="description" rows="5" required
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none resize-none">{{ old('description', $report->description) }}</textarea>
            </div>
            <div class="pt-2 flex justify-end gap-3">
                <a href="{{ route('reports.index') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold transition-all">
                    ОТМЕНА
                </a>
                <button type="submit" class="px-10 py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition-all shadow-sm active:scale-95">
                    СОХРАНИТЬ
                </button>
            </div>
        </form>
    </div>
</x-app-layout>