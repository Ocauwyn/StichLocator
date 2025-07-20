<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian penjahit </title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="h-full transition-all duration-300 bg-gray-800 text-white w-150 space-y-6 px-5 py-100 flex flex-col overflow-y-auto">
            <!-- Search bar -->
            <div class="relative w-full flex items-center justify-center bg-gray-800 sticky top-0 z-5 py-5">
                <input type="text"
                    class="bg-gray-200 text-gray-700 rounded-full py-2 pl-4 pr-10 w-full focus:outline-none focus:ring-2 focus:ring-gray-600"
                    placeholder="Search...">
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-white p-2 focus:outline-none focus:ring-2 focus:ring-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6m0 0l-6-6m6 6H4" />
                    </svg>
                </button>
            </div>

            <!-- Dynamic List Content -->
            <div id="location-list" class="space-y-4"></div>
        </div>


        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class=" border-b border-transparent py-4 px-6 flex justify-between items-center shadow-lg ">
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

            {{-- main content map dan detail --}}
            <main class="flex-1 bg-gray-100 relative">
                <!-- Elemen Peta Fullscreen -->
                <div id="map" class="absolute inset-0 z-0" style="height: 90vh; width: 100%;"></div>

                <!-- Detail Content -->
                <div id="detailContent" class="absolute inset-0 flex items-center justify-center z-10 hidden">
                    <div class="w-[300px] md:w-[350px] lg:w-[400px] p-6 bg-white shadow-lg rounded-lg relative">
                        <button onclick="closeDetails()" class="absolute top-4 right-4 bg-gray-800 text-white rounded-full p-2 hover:bg-gray-700">&times;</button>
                        <div id="detailView" class="space-y-4"></div>
                    </div>
                </div>
            </main>

        </div>
    </div>

</body>
</html>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

