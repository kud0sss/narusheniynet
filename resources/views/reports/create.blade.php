<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight uppercase">
            Создание заявления
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200 p-8 mt-6">
        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Гос. номер автомобиля</label>
                <input type="text" name="number" required placeholder="А000АА 00"
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Описание нарушения</label>
                <textarea name="description" rows="5" required placeholder="Опишите ситуацию..."
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none resize-none"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Фотография нарушения</label>
                <input type="file" name="path_img" required
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                <x-input-error :messages="$errors->get('report_image')" class="mt-2" />
            </div>

            <div class="pt-2 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3.5 rounded-xl font-bold transition-all shadow-sm active:scale-95">
                    ОТПРАВИТЬ
                </button>
            </div>
        </form>
    </div>
</x-app-layout>