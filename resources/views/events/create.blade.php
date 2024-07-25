<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg mx-auto">
            <div class="p-4 bg-white border-b border-gray-200">
                <div class="mb-4 text-center">
                    <h3 class="text-2xl font-semibold text-gray-700">{{ __('Add New Event') }}</h3>
                </div>

                <form method="POST" action="{{ route('events.store') }}" class="max-w-md mx-auto">
                    @csrf

                    <!-- Circuit Number -->
                    <div class="mb-3">
                        <x-input-label for="circuit_number" :value="__('Circuit Number')" />
                        <x-text-input id="circuit_number" name="circuit_number" class="block mt-1 w-full" type="text" value="{{ $circuit_number }}" disabled />
                        <x-input-error for="circuit_number" class="mt-2" />
                        <x-text-input id="circuit_id" name="circuit_id" type="hidden" value="{{ $circuit_id }}" />
                    </div>

                    <!-- Report Type -->
                    <div class="mb-3">
                        <x-input-label for="report_type_id" :value="__('Report Type')" />
                        <select id="report_type_id" name="report_type_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select a report type</option>
                            @foreach ($reportTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->report_type }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="report_type_id" class="mt-2" />
                    </div>

                    <!-- Circuit Status -->
                    <div class="mb-3">
                        <x-input-label for="circuit_status_id" :value="__('Circuit Status')" />
                        <select id="circuit_status_id" name="circuit_status_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select a circuit status</option>
                            @foreach ($circuitStatuses as $status)
                                <option value="{{ $status->id }}">{{ $status->circuit_status }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="circuit_status_id" class="mt-2" />
                    </div>

                    <!-- Report Detail -->
                    <div class="mb-3">
                        <x-input-label for="report_detail" :value="__('Report Detail')" />
                        <textarea id="report_detail" name="report_detail" class="form-control block mt-1 w-full" required></textarea>
                        <x-input-error for="report_detail" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-4">
                        <x-primary-button>
                            {{ __('Add Event') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
