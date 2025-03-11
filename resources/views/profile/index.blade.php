<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">User Profile</h2>

        @if(session('success'))
            <p class="text-green-500 text-center">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <p class="text-red-500 text-center">{{ $errors->first() }}</p>
        @endif

        <!-- Profile Info Section -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Profile Information</h3>
            <p class="text-gray-600"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="text-gray-600">
                <strong>Profile Image:</strong>
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" class="w-24 h-24 rounded-full border-2 border-blue-500 mt-2" alt="Profile Image">
                @else
                    <span class="text-red-500">No image uploaded</span>
                @endif
            </p>
        </div>

        <!-- Update Profile Section -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Update Profile</h3>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <div>
                    <label for="profile_image" class="block text-gray-700 font-medium">Upload Profile Image</label>
                    <input type="file" name="profile_image" id="profile_image"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Update Profile
                </button>
            </form>
        </div>

        <!-- Change Password Section -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Change Password</h3>
            <form method="POST" action="{{ route('profile.update-password') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="current_password" class="block text-gray-700 font-medium">Current Password</label>
                    <input type="password" name="current_password" id="current_password" placeholder="Current Password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <div>
                    <label for="new_password" class="block text-gray-700 font-medium">New Password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="New Password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-gray-700 font-medium">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Change Password
                </button>
            </form>
        </div>

        <!-- Change Email Section -->
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Change Email</h3>
            <form method="POST" action="{{ route('profile.update-email') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 font-medium">New Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Change Email
                </button>
            </form>
        </div>

        <!-- Logout Section -->
        <div class="text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Logout
                </button>
            </form>
        </div>
    </div>

</body>
</html>
