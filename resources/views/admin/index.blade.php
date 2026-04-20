<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Административная панель') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse"> 
                            <thead>
                                <tr class="border-b bg-gray-50">
                                    <th class="p-3 text-sm font-bold text-gray-600 uppercase w-1/5">ФИО</th>
                                    <th class="p-3 text-sm font-bold text-gray-600 uppercase w-2/5">Текст заявления</th>
                                    <th class="p-3 text-sm font-bold text-gray-600 uppercase w-1/5">Номер авто</th>
                                    <th class="p-3 text-sm font-bold text-gray-600 uppercase w-1/5">Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="p-3 text-sm align-top">
                                        {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }} {{ $report->user->middlename ?? '' }}
                                    </td>
                                    
                                    <td class="p-3 text-sm text-gray-700 break-words max-w-xs align-top">
                                        {{ $report->description }}
                                    </td>
                                    
                                    <td class="p-3 text-sm font-mono font-bold text-blue-700 align-top">
                                        {{ $report->number }}
                                    </td>
                                    
                                    <td class="p-3 align-top">
                                        @if($report->status_id == 1) 
                                            <form action="{{ route('admin.reports.update', $report->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <select name="status_id" 
                                                        onchange="this.form.submit()" 
                                                        class="text-sm rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 block w-full p-2 cursor-pointer">
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}" {{ $report->status_id == $status->id ? 'selected' : '' }}>
                                                            {{ mb_strtoupper(mb_substr($status->name, 0, 1)) . mb_substr($status->name, 1) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        @else
                                            @php
                                                $statusName = mb_strtolower($report->status->name ?? '');
                                                $colorClass = 'bg-gray-100 text-gray-800';
                                                
                                                if (str_contains($statusName, 'подтвержд')) {
                                                    $colorClass = 'bg-green-100 text-green-800';
                                                } elseif (str_contains($statusName, 'отклон')) {
                                                    $colorClass = 'bg-red-100 text-red-800';
                                                }
                                                
                                                $formattedName = mb_strtoupper(mb_substr($report->status->name, 0, 1)) . mb_substr($report->status->name, 1);
                                            @endphp
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $colorClass }}">
                                                {{ $formattedName }}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($reports->isEmpty())
                            <div class="text-center py-10 text-gray-500 italic">
                                Заявлений пока нет.
                            </div>
                        @endif
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>