<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Circuits List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-4 row justify-content-around">
                    <!-- Total Circuits Card -->
                    <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer" onclick="window.location.href='{{ route('circuits.list', ['status' => 'all']) }}'">
                        <h3 class="text-lg font-medium text-gray-900">Total Circuits</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalCircuits }}</p>
                    </div>

                    <!-- Active Circuits Card -->
                    <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer" onclick="window.location.href='{{ route('circuits.list', ['status' => 1]) }}'">
                        <h3 class="text-lg font-medium text-gray-900">Active Circuits</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $activeCircuits }}</p>
                    </div>

                    <!-- Inactive Circuits Card -->
                    <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer" onclick="window.location.href='{{ route('circuits.list', ['status' => 2]) }}'">
                        <h3 class="text-lg font-medium text-gray-900">Inactive Circuits</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $inactiveCircuits }}</p>
                    </div>

                    <!-- Faulty Circuits Card -->
                    <div class="bg-white p-4 rounded-lg shadow-md cursor-pointer" onclick="window.location.href='{{ route('circuits.list', ['status' => 5]) }}'">
                        <h3 class="text-lg font-medium text-gray-900">Faulty Circuits</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $faultyCircuits }}</p>
                    </div>
                </div>

                <!-- Search and Filter Form -->
                <form method="GET" action="{{ route('circuits.list') }}" class="mb-4">
                    <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <!-- ADD NEW CIRCUIT -->
                        <a href="{{ route('circuits.create') }}"
                           style="color: #1d4ed8; font-size: 1.875rem; margin-top: 0.25rem; margin-right: 0.3rem;"
                           class="hover:text-blue-950">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                        <input type="text" name="search" placeholder="Search by Circuit Number or Speed" value="{{ request('search') }}" class="border rounded-lg px-4 py-2 w-full md:w-1/3">

                        <!-- Filters -->
                        <select name="service_provider_id" class="border rounded-lg px-4 py-2 w-full md:w-1/4">
                            <option value="">Select Service Provider</option>
                            @foreach($serviceProviders as $provider)
                                <option value="{{ $provider->id }}" {{ request('service_provider_id') == $provider->id ? 'selected' : '' }}>
                                    {{ $provider->service_provider }}
                                </option>
                            @endforeach
                        </select>

                        <select name="circuit_type_id" class="border rounded-lg px-4 py-2 w-full md:w-1/4">
                            <option value="">Select Circuit Type</option>
                            @foreach($circuitTypes as $type)
                                <option value="{{ $type->id }}" {{ request('circuit_type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->circuit_type }}
                                </option>
                            @endforeach
                        </select>

                        <select name="entity_type_id" class="border rounded-lg px-4 py-2 w-full md:w-1/4">
                            <option value="">Select Entity Type</option>
                            @foreach($entityTypes as $type)
                                <option value="{{ $type->id }}" {{ request('entity_type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->entity_type }}
                                </option>
                            @endforeach
                        </select>

                        <select name="entity_name_id" class="border rounded-lg px-4 py-2 w-full md:w-1/4">
                            <option value="">Select Entity Name</option>
                            @foreach($entityNames as $name)
                                <option value="{{ $name->id }}" {{ request('entity_name_id') == $name->id ? 'selected' : '' }}>
                                    {{ $name->entity_name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-lg">Filter</button>
                    </div>
                </form>

                <!-- Circuits Table -->
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Circuit Number</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Speed</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Provider</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Circuit Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entity Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entity Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($circuits as $circuit)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $circuit->circuit_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $circuit->speed }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $circuit->serviceProvider->service_provider ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $circuit->circuitType->circuit_type ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $circuit->entityType->entity_type ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $circuit->entityName->entity_name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($circuit->circuitStatus)
                                        {{ $circuit->circuitStatus->circuit_status }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <a href="{{ route('circuits.edit', $circuit->id) }}" class="text-gray-800 hover:text-gray-500 text-2xl">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('circuits.destroy', $circuit->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-2xl">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('events.create', ['circuit_id' => $circuit->id]) }}" class="text-blue-600 hover:text-blue-900 text-2xl ml-3">
                                        <i class="fas fa-plus-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $circuits->appends(request()->query())->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
