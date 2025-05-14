<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <div class="container">
        <h2>Update Profile</h2>
        <form action="{{ url('/profile/update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="email" name="email" value="{{ auth()->user()->email }}" required>
            <input type="password" name="password" placeholder="New Password (Optional)">
            <input type="password" name="password_confirmation" placeholder="Confirm New Password">
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
