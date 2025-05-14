<x-app-layout>
    <h2 class="text-xl font-bold mb-4">All Feedbacks</h2>

    @if($feedbacks->isEmpty())
        <p>No feedback submitted yet.</p>
    @else
        <ul class="space-y-4">
            @foreach($feedbacks as $feedback)
                <li class="p-4 border rounded shadow">
                    <strong>User:</strong> {{ $feedback->user->name ?? 'Unknown' }} <br>
                    <strong>Message:</strong>
                    <p>{{ $feedback->message }}</p>
                    <span class="text-sm text-gray-500">Submitted: {{ $feedback->created_at->format('Y-m-d H:i') }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
