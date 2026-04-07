<x-app-layout>
    <div class="py-6 md:py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if ($errors->any())
                <div class="mb-6 p-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-100" role="alert">
                    <div class="font-medium text-base mb-1">Упс! Проверьте данные:</div>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border border-gray-200">
                <div class="p-4 sm:p-8 md:p-10 text-gray-900">
                    
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
                        <h2 class="text-xl md:text-2xl font-bold text-blue-900">Создать заявление</h2>
                        <a href="{{ route('reports.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Назад к списку
                        </a>
                    </div>

                    <form action="{{ route('reports.store') }}" method="POST" class="max-w-3xl mx-auto space-y-6">
                        @csrf
                
                        <div class="flex flex-col gap-2">
                            <label for="number" class="text-sm font-semibold text-gray-700">
                                Регистрационный номер автомобиля
                            </label>
                            <input type="text" name="number" id="number"
                                   value="{{ old('number') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                          focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none
                                          transition-all duration-200 placeholder-gray-400"
                                   placeholder="A123BC 174" required>
                        </div>
                        
                        <div class="flex flex-col gap-2">
                            <label for="description" class="text-sm font-semibold text-gray-700">
                                Описание нарушения
                            </label>
                            <textarea name="description" id="description" rows="5"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-3 
                                             focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none
                                             transition-all duration-200 placeholder-gray-400"
                                      placeholder="Подробно опишите нарушение..." required>{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="flex justify-center sm:justify-end pt-4">
                            <button type="submit" class="w-full sm:w-auto bg-red-600 hover:bg-red-700 
                                                       text-white font-bold py-3 px-12 rounded-lg 
                                                       shadow-md hover:shadow-lg transform active:scale-95
                                                       transition-all duration-200">
                                Отправить заявление
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>