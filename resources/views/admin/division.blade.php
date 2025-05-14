<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Division Office Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
        <h3 class="text-lg font-bold mb-4">Division Office Complaints</h3>

        @forelse($complaints as $complaint)
            <div class="mb-6 border-b pb-4">
                <strong>{{ $complaint->issue_id }}</strong> — 
                {{ ucfirst($complaint->category) }} — 
                <span class="text-sm italic text-gray-600">{{ ucfirst($complaint->status) }}</span>

                <p class="mt-1 text-sm text-gray-700">{{ $complaint->details }}</p>

                {{-- View Details --}}
                <a href="{{ route('admin.complaints.show', $complaint->id) }}" class="text-blue-600 hover:underline text-sm mt-2 inline-block">
                    View Details
                </a>

                {{-- Status update form --}}
                <form method="POST" action="{{ route('admin.update-status', $complaint->id) }}" class="mt-2">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center gap-2">
                        <select name="status" class="border p-2 rounded">
                            <option value="Received" {{ $complaint->status === 'Received' ? 'selected' : '' }}>Received</option>
                            <option value="Assigned" {{ $complaint->status === 'Assigned' ? 'selected' : '' }}>Assigned to Department</option>
                            <option value="Work Started" {{ $complaint->status === 'Work Started' ? 'selected' : '' }}>Work Started</option>
                            <option value="In Progress" {{ $complaint->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ $complaint->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Closed" {{ $complaint->status === 'Closed' ? 'selected' : '' }}>Closed</option>
                        </select>

                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        @empty
            <p class="text-gray-500">No complaints assigned yet.</p>
        @endforelse
    </div>
</x-app-layout>
