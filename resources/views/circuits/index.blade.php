<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Circuits Management') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('circuits.list') }}" class="btn btn-primary btn-block">List Circuits</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('circuits.create') }}" class="btn btn-primary btn-block">Add Circuit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>