<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- ADD NEW events -->

                <br>
                <hr/>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completion Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Detail</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Circuit Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th> <!-- New column for user name -->
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($events as $event)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->completion_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->report_detail }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->circuit->circuit_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->reportType->report_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->user ? $event->user->name : 'No user assigned' }}</td> <!-- Display user name or fallback message -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('events.edit', $event->id) }}" class="text-gray-800 hover:text-gray-500 text-2xl">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
