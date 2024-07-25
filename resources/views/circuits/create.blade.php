<!-- resources/views/circuits/create.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-lg mx-auto">
            <div class="p-4 bg-white border-b border-gray-200">
                <div class="mb-4 text-center">
                    <h3 class="text-2xl font-semibold text-gray-700">{{ __('Add Circuit') }}</h3>
                </div>

                <form action="{{ route('circuits.store') }}" method="POST" class="max-w-md mx-auto">
                    @csrf

                    <!-- Circuit Number -->
                    <div class="mb-3">
                        <x-input-label for="circuit_number" :value="__('Circuit Number')" />
                        <x-text-input id="circuit_number" name="circuit_number" class="block mt-1 w-full" type="text" value="{{ old('circuit_number') }}" required />
                        <x-input-error for="circuit_number" class="mt-2" />
                    </div>

                    <!-- Speed -->
                    <div class="mb-3">
                        <x-input-label for="speed" :value="__('Speed')" />
                        <x-text-input id="speed" name="speed" class="block mt-1 w-full" type="text" value="{{ old('speed') }}" required />
                        <x-input-error for="speed" class="mt-2" />
                    </div>

                    <!-- Service Provider -->
                    <div class="mb-3">
                        <x-input-label for="service_provider_id" :value="__('Service Provider')" />
                        <select id="service_provider_id" name="service_provider_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select a service provider</option>
                            @foreach ($serviceProviders as $serviceProvider)
                                <option value="{{ $serviceProvider->id }}" {{ old('service_provider_id') == $serviceProvider->id ? 'selected' : '' }}>
                                    {{ $serviceProvider->service_provider }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="service_provider_id" class="mt-2" />
                    </div>

                    <!-- Circuit Type -->
                    <div class="mb-3">
                        <x-input-label for="circuit_type_id" :value="__('Circuit Type')" />
                        <select id="circuit_type_id" name="circuit_type_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select a circuit type</option>
                            @foreach ($circuitTypes as $circuitType)
                                <option value="{{ $circuitType->id }}" {{ old('circuit_type_id') == $circuitType->id ? 'selected' : '' }}>
                                    {{ $circuitType->circuit_type }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="circuit_type_id" class="mt-2" />
                    </div>

                    <!-- Entity Type -->
                    <div class="mb-3">
                        <x-input-label for="entity_type_id" :value="__('Entity Type')" />
                        <select id="entity_type_id" name="entity_type_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select an entity type</option>
                            @foreach ($entityTypes as $entityType)
                                <option value="{{ $entityType->id }}" {{ old('entity_type_id') == $entityType->id ? 'selected' : '' }}>
                                    {{ $entityType->entity_type }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="entity_type_id" class="mt-2" />
                    </div>

                    <!-- Entity Name -->
                    <div class="mb-3">
                        <x-input-label for="entity_name_id" :value="__('Entity Name')" />
                        <select id="entity_name_id" name="entity_name_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select an entity name</option>
                            @foreach ($entityNames as $entityName)
                                <option value="{{ $entityName->id }}" {{ old('entity_name_id') == $entityName->id ? 'selected' : '' }}>
                                    {{ $entityName->entity_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="entity_name_id" class="mt-2" />
                    </div>

                    <!-- Circuit Status -->
                    <div class="mb-3">
                        <x-input-label for="circuit_status_id" :value="__('Circuit Status')" />
                        <select id="circuit_status_id" name="circuit_status_id" class="form-control block mt-1 w-full" required>
                            <option value="" disabled selected>Select a circuit status</option>
                            @foreach ($circuitStatuses as $circuitStatus)
                                <option value="{{ $circuitStatus->id }}" {{ old('circuit_status_id') == $circuitStatus->id ? 'selected' : '' }}>
                                    {{ $circuitStatus->circuit_status }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="circuit_status_id" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-4">
                        <x-primary-button>
                            {{ __('Add Circuit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
