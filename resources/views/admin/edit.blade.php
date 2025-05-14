<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Edit Admin</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $admin->name }}" required class="border p-2 w-full mb-3 rounded" />

        <input type="email" name="email" value="{{ $admin->email }}" required class="border p-2 w-full mb-3 rounded" />

        <select name="role" required class="border p-2 w-full mb-3 rounded">
            <option value="env_police" {{ $admin->role === 'env_police' ? 'selected' : '' }}>Environmental Police</option>
            <option value="municipal" {{ $admin->role === 'municipal' ? 'selected' : '' }}>Municipal Council</option>
            <option value="division_office" {{ $admin->role === 'division_office' ? 'selected' : '' }}>Division Office</option>
        </select>

        <input type="password" name="password" placeholder="New Password (optional)" class="border p-2 w-full mb-3 rounded" />

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Admin</button>
        <a href="{{ route('admin.manage') }}" class="ml-3 text-gray-600 hover:underline">Cancel</a>
    </form>
</x-app-layout>
