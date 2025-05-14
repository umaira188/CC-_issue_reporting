<x-app-layout>
    <h2 class="text-xl font-bold mb-4">All Complaints</h2>

    @if($complaints->isEmpty())
        <p>No complaints found.</p>
    @else
        <ul class="space-y-4">
            @foreach($complaints as $complaint)
                <li class="p-4 border rounded shadow">
                    <strong>Issue ID:</strong> {{ $complaint->issue_id }} <br>
                    <strong>Category:</strong> {{ ucfirst($complaint->category) }} <br>
                    <strong>Status:</strong> {{ ucfirst($complaint->status) }} <br>
                    <strong>User:</strong> {{ $complaint->user->name ?? 'N/A' }} <br>
                    <strong>Date:</strong> {{ $complaint->created_at->format('Y-m-d H:i') }}
                </li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
