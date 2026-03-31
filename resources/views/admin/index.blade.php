<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Административная панель' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="p-3">ФИО</th>
                                <th class="p-3">Текст заявления</th>
                                <th class="p-3">Номер автомобиля</th>
                                <th class="p-3">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr class="border-b">
                                <td class="p-3">
                                    {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }} {{ $report->user->middlename ?? '' }}
                                </td>
                                
                                <td class="p-3">{{ $report->description }}</td>
                                <td class="p-3">{{ $report->number }}</td>
                                
                                <td class="p-3">
                                    @if($report->status && trim(mb_strtolower($report->status->name)) == 'новое')
                                        <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                            @method('patch')
                                            @csrf 
                                            <select name="status_id" id="status_id" class="rounded border-gray-300">
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}" {{ $status->id === $report->status_id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    @else
                                        <span>
                                            {{ $report->status?->name }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>