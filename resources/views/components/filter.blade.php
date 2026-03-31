@props(['sort', 'status'])

<div class="mb-8">
    <h3 class="text-sm font-semibold text-gray-500 tracking-wider mb-2">Сортировка по дате:</h3>
    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('reports.index', ['sort' => 'desc']) }}"
           class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
            сначала новые
        </a>
        <a href="{{ route('reports.index', ['sort' => 'asc']) }}"
           class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
            сначала старые
        </a>
    </div>
</div>

<div class="mb-8">
    <h3 class="text-sm font-semibold text-gray-500 tracking-wider mb-2">Фильтр по статусу:</h3>
    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('reports.index') }}"
           class="px-4 py-2 bg-gray-100 rounded-md text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
            все
        </a>
        @foreach($statuses as $status)
            <a href="{{ route('reports.index', ['status' => $status->id]) }}"
               class="px-4 py-2 bg-gray-100 rounded-md text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200">
                {{ $status->name }}
            </a>
        @endforeach
    </div>
</div>