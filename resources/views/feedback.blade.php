<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Submit Feedback
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        @if(session('success'))
            <div  class="text-green-600 mb-2">{{ session('success') }}</div>
        @endif

       

        <form id='feedback-submit' method="POST" action="{{ route('feedback.submit') }}">
            @csrf
            <textarea name="message" rows="5" class="w-full p-2 border rounded" placeholder="Write your feedback here..." required></textarea>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded">Send Feedback</button>
        </form>
    </div>
</x-app-layout>
