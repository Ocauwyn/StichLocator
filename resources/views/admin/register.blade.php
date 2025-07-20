<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Tailor Finder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-md w-full">
        <div class="text-center mb-8">
            <img src="https://cdn-icons-png.flaticon.com/512/2972/2972072.png" alt="Tailor Icon" class="w-20 h-20 mx-auto mb-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Admin Registration</h2>
            <p class="text-gray-600">Create your admin account</p>
        </div>

        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class='bx bx-error text-red-500 text-xl'></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="name">
                    Full Name
                </label>
                <div class="relative">
                    <i class='bx bx-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400'></i>
                    <input type="text" name="name" id="name" 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your full name"
                           value="{{ old('name') }}"
                           required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                    Email Address
                </label>
                <div class="relative">
                    <i class='bx bx-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400'></i>
                    <input type="email" name="email" id="email" 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your email"
                           value="{{ old('email') }}"
                           required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                    Password
                </label>
                <div class="relative">
                    <i class='bx bx-lock-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400'></i>
                    <input type="password" name="password" id="passwordInput"
                           class="w-full pl-10 pr-12 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Create a strong password"
                           required>
                    <button type="button" onclick="togglePasswordVisibility('passwordInput', 'togglePassword')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class='bx bx-hide text-xl' id="togglePassword"></i>
                    </button>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="password_confirmation">
                    Confirm Password
                </label>
                <div class="relative">
                    <i class='bx bx-lock-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400'></i>
                    <input type="password" name="password_confirmation" id="confirmPasswordInput"
                           class="w-full pl-10 pr-12 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Confirm your password"
                           required>
                    <button type="button" onclick="togglePasswordVisibility('confirmPasswordInput', 'toggleConfirmPassword')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class='bx bx-hide text-xl' id="toggleConfirmPassword"></i>
                    </button>
                </div>
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center space-x-2">
                <i class='bx bx-user-plus text-xl'></i>
                <span>Create Admin Account</span>
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600">
                Already have an admin account? 
                <a href="{{ route('admin.login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                    Login here
                </a>
            </p>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId, toggleId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('bx-hide', 'bx-show');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('bx-show', 'bx-hide');
            }
        }
    </script>
</body>
</html>