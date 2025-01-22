<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian penjahit </title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gray-800 text-white w-150 space-y-6 px-4 py-7 flex flex-col overflow-scroll">
             <!-- Search bar -->
             <div class="relative w-full flex items-center justify-center">
                <input type="text" class="bg-gray-200 text-gray-700 rounded-full py-2 pl-4 pr-10 w-full focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Search...">
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2  text-white  p-2  focus:outline-none focus:ring-2 focus:ring-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6m0 0l-6-6m6 6H4" />
                    </svg>

                </button>
            </div>

            {{-- liat content --}}
            <div class="space-y-4">
                <h2 class="text-lg font-semibold mb-4">Hasil</h2>
                <div class="bg-white p-4 rounded-lg shadow-md flex space-x-4 items-start w-full">
                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/80" alt="Bandung Tailor" class="w-20 h-20 rounded-md object-cover">

                    <!-- Detail -->
                    <div class="flex-1">
                        <!-- Nama Usaha -->
                        <h3 class="text-lg font-semibold text-black">Bandung Tailor</h3>

                        <!-- Rating dan Ulasan -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="text-yellow-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.98 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118L10 13.427l-3.98 2.887c-.785.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.646 9.1c-.784-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69L9.049 2.927z"/>
                                </svg>
                                4,3
                            </span>
                            <span>(17)</span>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600">Penjahit · Jl. Bagusrangin No.1 No 33A</p>

                        <!-- Status dan Jam Tutup -->
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-green-600 font-semibold">Buka</span>
                            <span class="text-gray-600">· Tutup pukul 20.00</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md flex space-x-4 items-start w-full">
                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/80" alt="Bandung Tailor" class="w-20 h-20 rounded-md object-cover">

                    <!-- Detail -->
                    <div class="flex-1">
                        <!-- Nama Usaha -->
                        <h3 class="text-lg font-semibold text-black">Bandung Tailor</h3>

                        <!-- Rating dan Ulasan -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="text-yellow-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.98 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118L10 13.427l-3.98 2.887c-.785.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.646 9.1c-.784-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69L9.049 2.927z"/>
                                </svg>
                                4,3
                            </span>
                            <span>(17)</span>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600">Penjahit · Jl. Bagusrangin No.1 No 33A</p>

                        <!-- Status dan Jam Tutup -->
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-green-600 font-semibold">Buka</span>
                            <span class="text-gray-600">· Tutup pukul 20.00</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md flex space-x-4 items-start w-full">
                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/80" alt="Bandung Tailor" class="w-20 h-20 rounded-md object-cover">

                    <!-- Detail -->
                    <div class="flex-1">
                        <!-- Nama Usaha -->
                        <h3 class="text-lg font-semibold text-black">Bandung Tailor</h3>

                        <!-- Rating dan Ulasan -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="text-yellow-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.98 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118L10 13.427l-3.98 2.887c-.785.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.646 9.1c-.784-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69L9.049 2.927z"/>
                                </svg>
                                4,3
                            </span>
                            <span>(17)</span>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600">Penjahit · Jl. Bagusrangin No.1 No 33A</p>

                        <!-- Status dan Jam Tutup -->
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-green-600 font-semibold">Buka</span>
                            <span class="text-gray-600">· Tutup pukul 20.00</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md flex space-x-4 items-start w-full">
                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/80" alt="Bandung Tailor" class="w-20 h-20 rounded-md object-cover">

                    <!-- Detail -->
                    <div class="flex-1">
                        <!-- Nama Usaha -->
                        <h3 class="text-lg font-semibold text-black">Bandung Tailor</h3>

                        <!-- Rating dan Ulasan -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="text-yellow-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.98 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118L10 13.427l-3.98 2.887c-.785.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.646 9.1c-.784-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69L9.049 2.927z"/>
                                </svg>
                                4,3
                            </span>
                            <span>(17)</span>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600">Penjahit · Jl. Bagusrangin No.1 No 33A</p>

                        <!-- Status dan Jam Tutup -->
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-green-600 font-semibold">Buka</span>
                            <span class="text-gray-600">· Tutup pukul 20.00</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md flex space-x-4 items-start w-full">
                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/80" alt="Bandung Tailor" class="w-20 h-20 rounded-md object-cover">

                    <!-- Detail -->
                    <div class="flex-1">
                        <!-- Nama Usaha -->
                        <h3 class="text-lg font-semibold text-black">Bandung Tailor</h3>

                        <!-- Rating dan Ulasan -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="text-yellow-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.98 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118L10 13.427l-3.98 2.887c-.785.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.646 9.1c-.784-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69L9.049 2.927z"/>
                                </svg>
                                4,3
                            </span>
                            <span>(17)</span>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600">Penjahit · Jl. Bagusrangin No.1 No 33A</p>

                        <!-- Status dan Jam Tutup -->
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-green-600 font-semibold">Buka</span>
                            <span class="text-gray-600">· Tutup pukul 20.00</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-md flex space-x-4 items-start w-full">
                    <!-- Gambar -->
                    <img src="https://via.placeholder.com/80" alt="Bandung Tailor" class="w-20 h-20 rounded-md object-cover">

                    <!-- Detail -->
                    <div class="flex-1">
                        <!-- Nama Usaha -->
                        <h3 class="text-lg font-semibold text-black">Bandung Tailor</h3>

                        <!-- Rating dan Ulasan -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <span class="text-yellow-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.908c.969 0 1.371 1.24.588 1.81l-3.98 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118L10 13.427l-3.98 2.887c-.785.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.646 9.1c-.784-.57-.38-1.81.588-1.81h4.908a1 1 0 00.95-.69L9.049 2.927z"/>
                                </svg>
                                4,3
                            </span>
                            <span>(17)</span>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600">Penjahit · Jl. Bagusrangin No.1 No 33A</p>

                        <!-- Status dan Jam Tutup -->
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-green-600 font-semibold">Buka</span>
                            <span class="text-gray-600">· Tutup pukul 20.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class=" border-b border-transparent py-4 px-6 flex justify-between items-center shadow-lg">
                <button id="menu-toggle" class="text-gray-700 focus:outline-none lg:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <!-- Search bar -->
                    <div class="relative hidden" id="1">
                        <input type="text" class="bg-gray-200 text-gray-700 rounded-full py-2 pl-4 pr-10 w-64 focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Search...">
                        <button class="absolute right-3 top-1/2 transform -translate-y-1/2  text-white  p-2  focus:outline-none focus:ring-2 focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6m0 0l-6-6m6 6H4" />
                            </svg>

                        </button>
                    </div>
                    <!-- Profile button -->
                    <button class="bg-white text-black px-4 py-2 rounded-full">Logout</button>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-6 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>

<script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
        const sidebar = document.getElementById('sidebar');
        const searchbar = document.getElementById('1');
        sidebar.classList.toggle('hidden');
        searchbar.classList.toggle('hidden');

    });
</script>

</body>
</html>
