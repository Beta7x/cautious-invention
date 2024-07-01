@vite('resources/css/app.css')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md px-8 py-6 mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 dark:text-gray-100">Reset Password</h1>

        <form method="POST" action="{{ route('password.update') }}" class="mt-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request()->email }}">

            <div class="mt-4">
                <label for="password" class="block text-base text-gray-700 dark:text-gray-100">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" class="w-full px-3 py-2 mt-1 text-base text-gray-800 placeholder-gray-500 border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required/>
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block text-base text-gray-700 dark:text-gray-100">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" class="w-full px-3 py-2 mt-1 text-base text-gray-800 placeholder-gray-500 border rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" required/>
            </div>

            @if ($errors->any())
                <div class="mt-4">
                    <ul class="text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-4">
                <button type="submit" class="w-full px-4 py-2 text-base font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>