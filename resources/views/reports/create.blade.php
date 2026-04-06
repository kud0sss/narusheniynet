<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex flex-col mb-8">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-bold text-blue-900">Создать заявление</h2>
                            <a href="{{ route('reports.index') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                Назад
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('reports.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow border border-gray-100 transition-colors">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="number" class="block text-gray-700 font-medium mb-2">
                                Регистрационный номер автомобиля
                            </label>
                            <input type="text" name="number" id="number"
                                   value="{{ old('number') }}"
                                   class="w-full border border-gray-300 rounded px-4 py-3 
                                          bg-white text-gray-900 
                                          focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                                   placeholder="A123BC 174" required>
                        </div>
                        
                        <div class="mb-8">
                            <label for="description" class="block text-gray-700 font-medium mb-2">
                                Описание нарушения
                            </label>
                            <textarea name="description" id="description" rows="6"
                                      class="w-full border border-gray-300 rounded px-4 py-3 
                                             bg-white text-gray-900 
                                             focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                                      placeholder="Подробно опишите нарушение" required>{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 
                                                       text-white font-bold py-3 px-10 rounded shadow-sm hover:shadow-md transition-all active:transform active:scale-95">
                                Создать заявление
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>