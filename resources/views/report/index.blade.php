<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen transition-colors duration-300">

    <header class="bg-blue-700 text-white p-5 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold">НАРУШЕНИЙ.НЕТ</h1>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('reports.create') }}"
           class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded mb-10 transition-colors">
            Создать заявление
        </a>

        <div class="mb-8">
            <h3 class="text-sm font-semibold text-gray-500 tracking-wider mb-2 dark:text-gray-400">Сортировка по дате:</h3>
            <div class="flex gap-2 flex-wrap">
                <a href="{{ route('reports.index', ['sort' => 'desc']) }}"
                class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium text-gray-700 
                        hover:bg-blue-100 hover:text-blue-700 
                        focus:bg-blue-100 focus:text-blue-700 focus:outline-none
                        dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 
                        dark:hover-bg-blue-900 dark:hover-text-blue-200
                        dark:focus-bg-blue-900 dark:focus-text-blue-200
                        transition-colors duration-200">
                    сначала новые
                </a>
                <a href="{{ route('reports.index', ['sort' => 'asc']) }}"
                class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm font-medium text-gray-700 
                        hover:bg-blue-100 hover:text-blue-700 
                        focus:bg-blue-100 focus:text-blue-700 focus:outline-none
                        dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 
                        dark:hover-bg-blue-900 dark:hover-text-blue-200
                        dark:focus-bg-blue-900 dark:focus-text-blue-200
                        transition-colors duration-200">
                    сначала старые
                </a>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-sm font-semibold text-gray-500 tracking-wider mb-2 dark:text-gray-400">Фильтр по статусу:</h3>
            <div class="flex gap-2 flex-wrap">
                @foreach($statuses as $status)
                    <a href="{{ route('reports.index', ['status' => $status->id]) }}"
                    class="px-4 py-2 bg-gray-100 rounded-md text-sm font-medium text-gray-600 
                            hover:bg-blue-100 hover:text-blue-700 
                            focus:bg-blue-100 focus:text-blue-700 focus:outline-none
                            dark:bg-gray-800 dark:text-gray-400 
                            dark:hover-bg-blue-900 dark-hover-text-blue-200
                            dark:focus-bg-blue-900 dark-focus-text-blue-200
                            transition-colors duration-200">
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
                            @method('delete')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 font-medium transition-colors cursor-pointer">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <br>{{ $reports->appends(request()->query())->links() }}
    </main>
</body>
</html>