<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">НАРУШЕНИЙ.НЕТ — Редактировать заявление</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-bold text-blue-900">Редактировать заявление</h2>
                        <a href="{{ route('reports.index') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                            Назад
                        </a>
                    </div>

                    <form action="{{ route('reports.update', $report) }}" method="POST" class="bg-white p-8 rounded-lg shadow transition-colors">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="number" class="block text-gray-700 font-medium mb-2">
                                Регистрационный номер авто
                            </label>
                            <input type="text" name="number" id="number"
                                   value="{{ old('number', $report->number ?? '') }}"
                                   class="w-full border border-gray-300 rounded px-4 py-3 
                                          bg-white text-gray-900 
                                          focus:outline-blue-500 transition-colors"
                                   placeholder="A123BC 174" required>
                        </div>
                        
                        <div class="mb-8">
                            <label for="description" class="block text-gray-700 font-medium mb-2">
                                Описание нарушения
                            </label>
                            <textarea name="description" id="description" rows="6"
                                      class="w-full border border-gray-300 rounded px-4 py-3 
                                             bg-white text-gray-900 
                                             focus:outline-blue-500 transition-colors"
                                      placeholder="Описание нарушения" required>{{ old('description', $report->description) }}</textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 
                                                       text-white font-bold py-3 px-10 rounded transition-colors">
                                Обновить заявление
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
