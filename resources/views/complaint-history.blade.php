<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Complaint History
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        @forelse($complaints as $complaint)
            <div class="mb-6 p-4 border rounded bg-white dark:bg-gray-800 shadow">
                <h3 class="font-semibold text-lg mb-2">Issue ID: {{ $complaint->issue_id }}</h3>
                <p><strong>Category:</strong> {{ ucfirst($complaint->category) }}</p>
                <p><strong>Current Status:</strong> {{ ucfirst($complaint->status) }}</p>
                <p><strong>Submitted At:</strong> 
                    {{ \Carbon\Carbon::parse($complaint->created_at)->format('Y-m-d H:i') }}
                </p>

                <h4 class="font-bold mt-4 mb-2">Status Timeline:</h4>
                <ul class="pl-4 border-l-2 border-indigo-500">
                    @forelse($complaint->statusLogs as $log)
                        <li class="mb-2">
                            <span class="text-indigo-600 font-semibold">{{ $log->status }}</span>
                            <span class="text-sm text-gray-500">
                                — {{ \Carbon\Carbon::parse($log->changed_at)->format('d M Y, h:i A') }}
                            </span>
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">No timeline available.</li>
                    @endforelse
                </ul>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-300">You haven't submitted any complaints yet.</p>
        @endforelse
    </div>
</x-app-layout>
