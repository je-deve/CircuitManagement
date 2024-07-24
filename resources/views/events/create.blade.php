<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="report_detail" class="block text-sm font-medium text-gray-700">Report Detail</label>
                        <textarea name="report_detail" id="report_detail" class="mt-1 block w-full" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="circuit_id" class="block text-sm font-medium text-gray-700">Circuit</label>
                        <select name="circuit_id" id="circuit_id" class="mt-1 block w-full" required>
                            @foreach($circuits as $circuit)
                                <option value="{{ $circuit->id }}">{{ $circuit->circuit_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="report_type_id" class="block text-sm font-medium text-gray-700">Report Type</label>
                        <select name="report_type_id" id="report_type_id" class="mt-1 block w-full" required>
                            @foreach($reportTypes as $reportType)
                                <option value="{{ $reportType->id }}">{{ $reportType->report_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Add Event') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
