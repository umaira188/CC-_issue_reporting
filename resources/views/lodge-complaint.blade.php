<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lodge a Complaint
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <form id='complaint-form' action="{{ route('submit-complaint') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Type of the Issue:</label>
            <select name="issueType" required class="block mb-4 w-full border p-2 rounded">
                <option>Select the Issue Type</option>
                <option value="road">Road Maintenance</option>
                <option value="lighting">Street Lighting</option>
                <option value="water">Water & Drainage</option>
                <option value="garbage">Illegal Garbage Dumping</option>
            </select>

            <label>Address:</label>
            <input type="text" name="address" required class="block mb-4 w-full border p-2 rounded">

            <label>Details:</label>
            <textarea name="details" required class="block mb-4 w-full border p-2 rounded"></textarea>

            <label>Upload Image:</label>
            <input type="file" name="image" accept="image/*" class="block mb-4">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</x-app-layout>
