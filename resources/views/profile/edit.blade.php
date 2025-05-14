<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(Auth::user()->role === 'user')
                {{-- ✅ Show all profile forms for normal users --}}
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            @else
                {{-- 🚫 Block access for admins --}}
                <div class="p-4 sm:p-8 bg-yellow-100 text-yellow-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <p class="font-semibold mb-2">Access Restricted</p>
                        <p>You are logged in as <strong>{{ Auth::user()->role }}</strong>.</p>
                        <p>Profile updates, password changes, and account deletion are disabled for your role.</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
