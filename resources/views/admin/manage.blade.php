<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Super Admin Panel</h2>

    <p class="mb-6 text-gray-600">You can manage department admin accounts from here.</p>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Admin Creation Form --}}
    <h3 class="text-lg font-semibold mb-2">Create a New Admin</h3>

    <form action="{{ route('admin.create') }}" method="POST" class="mb-8">
        @csrf

        <input type="text" name="name" placeholder="Full Name" required class="border p-2 w-full mb-3 rounded" />
        <input type="email" name="email" placeholder="Email Address" required class="border p-2 w-full mb-3 rounded" />
        <select name="role" required class="border p-2 w-full mb-3 rounded">
            <option value="" disabled selected>-- Select Department --</option>
            <option value="env_police">Environmental Police</option>
            <option value="municipal">Municipal Council</option>
            <option value="division_office">Division Office</option>
        </select>
        <input type="password" name="password" placeholder="Password" required class="border p-2 w-full mb-4 rounded" />

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded">
            Create Admin
        </button>
    </form>

    {{-- List of Existing Admins with Edit/Delete --}}
    <h3 class="text-lg font-semibold mb-2">Existing Admins</h3>

    <ul class="space-y-2">
        @forelse($admins as $admin)
            <li class="p-2 bg-gray-100 rounded text-gray-800 flex justify-between items-center">
                <div>
                    👤 {{ $admin->name }} — 
                    <span class="text-sm italic text-gray-500">{{ $admin->role }}</span>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.edit', $admin->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>

                    <form action="{{ route('admin.delete', $admin->id) }}" method="POST" onsubmit="return confirm('Delete this admin?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline text-sm">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="text-gray-500">No admin accounts yet.</li>
        @endforelse
    </ul>
</x-app-layout>
