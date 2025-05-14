<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        /* Same CSS styles */
    </style>
</head>
<body>

    <div class="auth-form">
        <h2>Update Profile</h2>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ url('/profile') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>

            <button type="submit" class="submit-button">Update Profile</button>
        </form>
    </div>

</body>
</html>
