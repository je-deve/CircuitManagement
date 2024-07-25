<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Filters -->
                <form action="{{ route('events.index') }}" method="GET" class="mb-6">
                    <div class="flex flex-wrap items-end gap-4">
                        <!-- Search by Circuit Number -->
                        <div class="flex-1 min-w-[200px]">
                            <label for="circuit_number" class="block text-sm font-medium text-gray-700">{{ __('Circuit Number') }}</label>
                            <input type="text" name="circuit_number" id="circuit_number" value="{{ request('circuit_number') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3">
                        </div>

                        <!-- Filter by User -->
                        <div class="flex-1 min-w-[200px]">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">{{ __('User') }}</label>
                            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3">
                                <option value="">{{ __('All Users') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter by Report Type -->
                        <div class="flex-1 min-w-[200px]">
                            <label for="report_type_id" class="block text-sm font-medium text-gray-700">{{ __('Report Type') }}</label>
                            <select name="report_type_id" id="report_type_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3">
                                <option value="">{{ __('All Report Types') }}</option>
                                @foreach($reportTypes as $reportType)
                                    <option value="{{ $reportType->id }}" {{ request('report_type_id') == $reportType->id ? 'selected' : '' }}>{{ $reportType->report_type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex-shrink-0">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                {{ __('Filter') }}
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Table -->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completion Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Detail</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Circuit Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($events as $event)
                        <tr class="{{ $event->completion_date ? 'bg-green-100 text-green-800' : 'bg-white' }}">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->completion_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->report_detail }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->circuit->circuit_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->reportType->report_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if (!$event->completion_date)
                                    <form action="{{ route('events.complete', $event->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-button type="submit">{{ __('Mark as Completed') }}</x-button>
                                    </form>
                                @else
                                    {{ __('Completed') }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
