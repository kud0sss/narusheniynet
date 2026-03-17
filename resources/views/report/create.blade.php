<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ — Создать заявление</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen transition-colors duration-300">

    <header class="bg-blue-700 text-white p-5 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold">НАРУШЕНИЙ.НЕТ</h1>
        </div>
    </header>

    <main class="container mx-auto py-10 px-4 sm:px-6 lg:px-8 flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-blue-900">Создать заявление</h2>
                <a href="{{ route('reports.index') }}"
                   class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                    Назад
                </a>
            </div>

            <form action="{{ route('reports.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow transition-colors">
                @csrf
                <div class="mb-6">
                    <label for="number" class="block text-gray-700 font-medium mb-2">
                        Регистрационный номер автомобиля
                    </label>
                    <input type="text" name="number" id="number"
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
                              placeholder="Подробно опишите нарушение" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 
                                   text-white font-bold py-3 px-10 rounded transition-colors">
                        Создать заявление
                    </button>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>