<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ — Мои заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <header class="bg-blue-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">НАРУШЕНИЙ.НЕТ</h1>
            
            <div class="flex items-center gap-6">
                <span>Носова Ольга Петровна</span>
                <a href="#" class="text-white underline">выйти</a>
            </div>
        </div>
    </header>

    <main class="container mx-auto py-8 px-4">
        
        <div class="mb-8">
            <a href="{{ route('reports.create') }}"
               class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded">
                создать заявление
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($reports as $report)
                <div class="bg-white border border-gray-300 rounded-lg shadow p-5">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <div class="text-sm text-gray-500">
                                {{ $report->created_at->format('d.m.Y') }}
                            </div>
                            <div class="font-bold text-lg text-blue-900">
                                {{ $report->registration_number ?? $report->car_number ?? $report->number ?? '—' }}
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('reports.edit', $report) }}" class="text-blue-600 hover:text-blue-800 text-xl">✏️</a>
                            
                            <form action="{{ route('reports.destroy', $report) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Точно удалить заявление?')" 
                                        style="background: none; border: none; color: #ef4444; font-size: 1.3rem; cursor: pointer;">
                                    🗑️
                                </button>
                            </form>
                        </div>

                    <p class="text-gray-700 mb-4 line-clamp-4">
                        {{ $report->description }}
                    </p>

                    <div class="text-sm">
                        Статус заявления — 
                        <span class="font-bold
                            {{ $report->status_id == 1 ? 'text-blue-600' : '' }}
                            {{ $report->status_id == 2 ? 'text-red-600' : '' }}
                            {{ $report->status_id == 3 ? 'text-green-600' : '' }}">
                            {{ $report->status->name ?? 'не указан' }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        @if($reports->isEmpty())
            <p class="text-center text-gray-500 py-12 text-lg">
                У вас пока нет заявлений
            </p>
        @endif

    </main>

</body>
</html>