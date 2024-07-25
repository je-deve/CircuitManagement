<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Event') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('events.store') }}">
            @csrf

            <div>
                <x-label for="circuit_number" value="{{ __('Circuit Number') }}" />
                <x-input id="circuit_number" type="text" class="block mt-1 w-full" value="{{ $circuit_number }}" disabled />
                <x-input id="circuit_id" type="hidden" name="circuit_id" value="{{ $circuit_id }}" />
            </div>

            <div class="mt-4">
                <x-label for="report_type_id" value="{{ __('Report Type') }}" />
                <select id="report_type_id" name="report_type_id" class="block mt-1 w-full" required>
                    @foreach ($reportTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->report_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-label for="circuit_status_id" value="{{ __('Circuit Status') }}" />
                <select id="circuit_status_id" name="circuit_status_id" class="block mt-1 w-full" required>
                    @foreach ($circuitStatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->circuit_status }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mt-4">
                <x-label for="completion_date" value="{{ __('Completion Date') }}" />
                <x-input id="completion_date" type="date" name="completion_date" class="block mt-1 w-full" />
            </div>

            <div class="mt-4">
                <x-label for="report_detail" value="{{ __('Report Detail') }}" />
                <textarea id="report_detail" name="report_detail" class="block mt-1 w-full" required></textarea>
            </div>

            <div class="mt-4">
                <x-button>
                    {{ __('Add Event') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
