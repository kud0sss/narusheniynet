<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                    <a href="{{ route('reports.create') }}"
                       class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded mb-10 transition-colors">
                        Создать заявление
                    </a>
                    
                    <x-filter :sort=$sort :status=$status></x-filter>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($reports as $report)
                            <div class="bg-white border border-gray-200 p-4 md:p-6 rounded-lg shadow p-6 transition-colors hover:shadow-md">
                                <div class="text-sm text-gray-500 mb-1">
                                    <strong>{{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}</strong>
                                </div>
                                <div class="font-bold text-xl text-blue-900 mb-3">
                                    {{ $report->number }}
                                </div>
                                <p class="text-gray-700 mb-5 line-clamp-4">
                                    {{ $report->description }}
                                </p>

                                <x-status :type="($report->status->name)">
                                    {{ $report->status->name }}
                                </x-status>

                                <div class="flex justify-end gap-5 mt-4">
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
                    <div class="mt-6">
                        {{ $reports->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>