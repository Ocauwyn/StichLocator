<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Tailor Finder</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full text-center">
    <div class="mb-6">
      <img src="https://cdn-icons-png.flaticon.com/512/2972/2972072.png" alt="Tailor Icon" class="w-16 mx-auto">
      <h2 class="text-2xl font-bold text-gray-700 mt-2">Login to StitchLocator</h2>
      <p class="text-sm text-gray-500">Find the best tailors near you!</p>
    </div>

    <!-- Session Messages -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email" required />
      </div>
      
      <div class="relative">
        <label class="block text-gray-700 text-sm font-semibold mb-1">Password</label>
        <input type="password" name="password" id="passwordInput" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password" required />
        <i class="bx bx-hide absolute right-4 top-10 cursor-pointer text-gray-500" onclick="togglePasswordVisibility()"></i>
      </div>
      
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Login Now</button>
    </form>
    
    <p class="mt-4 text-sm text-gray-500">Not yet a member? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Signup now</a></p>
  </div>
  
  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("passwordInput");
      var toggleIcon = document.querySelector(".bx-hide");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.replace("bx-hide", "bx-show");
      } else {
        passwordInput.type = "password";
        toggleIcon.classList.replace("bx-show", "bx-hide");
      }
    }
  </script>
</body>
</html>
