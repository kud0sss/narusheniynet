<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">НАРУШЕНИЙ.НЕТ</h2>
    </x-slot>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                    <a href="{{ route('reports.create') }}"
                       class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded mb-10 transition-colors">
                        Создать заявление
                    </a>

                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-500 tracking-wider mb-2">Сортировка по дате:</h3>
                        <div class="flex gap-2 flex-wrap">
                            <a href="{{ route('reports.index', ['sort' => 'desc']) }}"
                               class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium text-gray-700 
                                       hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
                                сначала новые
                            </a>
                            <a href="{{ route('reports.index', ['sort' => 'asc']) }}"
                               class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium text-gray-700 
                                       hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
                                сначала старые
                            </a>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-500 tracking-wider mb-2">Фильтр по статусу:</h3>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($statuses as $status)
                                <a href="{{ route('reports.index', ['status' => $status->id]) }}"
                                   class="px-4 py-2 bg-gray-100 rounded-md text-sm font-medium text-gray-600 
                                           hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
                                    {{ $status->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($reports as $report)
                            <div class="bg-white border border-gray-200 rounded-lg shadow p-6 transition-colors hover:shadow-md">
                                <div class="text-sm text-gray-500 mb-1">
                                    <strong>{{ $report->created_at }}</strong>
                                </div>
                                <div class="font-bold text-xl text-blue-900 mb-3">
                                    {{ $report->number }}
                                </div>
                                <p class="text-gray-700 mb-5 line-clamp-4">
                                    {{ $report->description }}
                                </p>
                                <p>Статус: {{ $report->status->name }}</p>
                                <div class="flex justify-end gap-5">
                                    <a href="{{ route('reports.edit', $report) }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        Редактировать
                                    </a>
                                    <form action="{{ route('reports.destroy', $report) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 font-medium transition-colors cursor-pointer">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $reports->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
