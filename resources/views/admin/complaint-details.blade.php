<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Complaint Details
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 shadow rounded">
        <p><strong>Issue ID:</strong> {{ $complaint->issue_id }}</p>
        <p><strong>Category:</strong> {{ ucfirst($complaint->category) }}</p>
        <p><strong>Address:</strong> {{ $complaint->address }}</p>
        <p><strong>Status:</strong> {{ $complaint->status }}</p>
        <p><strong>Submitted By:</strong> {{ $complaint->user->name }}</p>
        <p><strong>Details:</strong> {{ $complaint->details }}</p>

        @if($complaint->image)
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $complaint->image) }}" alt="Complaint Image" class="max-w-xs rounded shadow">
        @endif

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">← Back</a>
        </div>
    </div>
</x-app-layout>
