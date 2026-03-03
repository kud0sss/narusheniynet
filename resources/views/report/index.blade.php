<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen transition-colors duration-300">

    <header class="bg-blue-700 dark:bg-blue-950 text-white p-5 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold">НАРУШЕНИЙ.НЕТ</h1>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('reports.create') }}"
           class="inline-block bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800 text-white font-bold py-3 px-6 rounded mb-10 transition-colors">
            Создать заявление
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reports as $report)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow p-6 transition-colors hover:shadow-md">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                        {{ $report->created_at }}
                    </div>
                    <div class="font-bold text-xl text-blue-900 dark:text-blue-300 mb-3">
                        {{ $report->number }}
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 mb-5 line-clamp-4">
                        {{ $report->description }}
                    </p>

                    <div class="flex justify-end gap-5">
                        <a href="{{ route('reports.edit', $report) }}"
                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium transition-colors">
                            Редактировать
                        </a>
                        <form action="{{ route('reports.destroy', $report) }}" method="POST" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 font-medium transition-colors cursor-pointer">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    
</body>
</html>