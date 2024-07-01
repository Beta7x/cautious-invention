@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6">Profile</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white py-2 px-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-4">User Information</h2>
        <div class="bg-gray-100 p-4 rounded">
            <p class="mb-2"><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-4">Change Password</h2>
        <form action="{{ route('profile.updatePassword') }}" method="POST" class="bg-gray-100 p-6 rounded">
            @csrf

            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">Current Password:</label>
                <input type="password" name="current_password" id="current_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('current_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">New Password:</label>
                <input type="password" name="new_password" id="new_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('new_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password:</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('new_password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
