<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodSave Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="min-h-screen flex">
        <!-- Left Panel - Branding -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-green-800 via-green-700 to-teal-700 flex-col justify-between p-12 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="leaf-grid" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                            <circle cx="30" cy="30" r="20" fill="none" stroke="white" stroke-width="1"/>
                            <path d="M30 10 C20 20, 10 30, 30 50 C50 30, 40 20, 30 10Z" fill="white" opacity="0.3"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#leaf-grid)"/>
                </svg>
            </div>

            <!-- Logo -->
            <div class="relative z-10">
                <div class="flex items-center gap-3">
                    <div class="bg-white/20 p-3 rounded-2xl backdrop-blur-sm">
                        <i class="fas fa-leaf text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold text-white">FoodSave</h1>
                        <p class="text-green-200 text-sm font-medium">Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- Center Content -->
            <div class="relative z-10 text-white">
                <div class="text-6xl mb-6">🌱</div>
                <h2 class="text-4xl font-extrabold leading-tight mb-4">
                    Selamatkan Makanan,<br>
                    <span class="text-green-300">Selamatkan Bumi.</span>
                </h2>
                <p class="text-green-200 text-lg leading-relaxed max-w-sm">
                    Bergabung bersama ribuan orang yang peduli lingkungan. Dapatkan makanan berkualitas dengan harga hemat.
                </p>

                <!-- Stats -->
                <div class="mt-8 grid grid-cols-3 gap-4">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-center border border-white/20">
                        <p class="text-2xl font-extrabold">2.4t</p>
                        <p class="text-xs text-green-200 mt-1">Makanan Diselamatkan</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-center border border-white/20">
                        <p class="text-2xl font-extrabold">10K+</p>
                        <p class="text-xs text-green-200 mt-1">Pengguna Aktif</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-center border border-white/20">
                        <p class="text-2xl font-extrabold">500+</p>
                        <p class="text-xs text-green-200 mt-1">Mitra Restoran</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Quote -->
            <div class="relative z-10">
                <p class="text-green-300 text-sm italic">"Setiap suap yang diselamatkan adalah langkah untuk bumi yang lebih baik."</p>
            </div>
        </div>

        <!-- Right Panel - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center gap-2 mb-8">
                    <div class="bg-green-700 p-2 rounded-xl">
                        <i class="fas fa-leaf text-white text-lg"></i>
                    </div>
                    <h1 class="text-xl font-extrabold text-green-900">FoodSave Indonesia</h1>
                </div>

                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
