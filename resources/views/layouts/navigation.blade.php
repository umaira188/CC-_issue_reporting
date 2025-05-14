{{-- Authenticated users --}}
@auth
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                {{-- Navigation Links --}}
                <div class="flex space-x-6">
                    {{-- USER --}}
                    @if(Auth::user()->role === 'user')
                        <a href="{{ route('lodge-complaint') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Lodge Complaint</a>
                        <a href="{{ route('complaint.history') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Complaint History</a>
                        <a href="{{ route('feedback') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Feedback</a>
                        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Profile</a>

                    {{-- SUPER ADMIN --}}
                    @elseif(Auth::user()->role === 'super_admin')
                        <a href="{{ route('admin.manage') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Manage Admins</a>
                        <a href="{{ route('admin.all-complaints') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> All Complaints</a>
                        <a href="{{ route('admin.all-feedbacks') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> All Feedbacks</a>

                    {{-- ENV POLICE ADMIN --}}
                    @elseif(Auth::user()->role === 'env_police')
                        <a href="{{ route('admin.env') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Env Police Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Profile</a>

                    {{-- MUNICIPAL ADMIN --}}
                    @elseif(Auth::user()->role === 'municipal')
                        <a href="{{ route('admin.municipal') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Municipal Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Profile</a>

                    {{-- DIVISION OFFICE ADMIN --}}
                    @elseif(Auth::user()->role === 'division_office')
                        <a href="{{ route('admin.division') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Division Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline"> Profile</a>
                    @endif
                </div>

                {{-- Right side: user and logout --}}
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 dark:text-red-400 hover:underline">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
@endauth
