<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodSave Indonesia</title>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-link.active { background-color: #f0fdf4; color: #15803d; }
        .sidebar-link.active i { color: #16a34a; }
        .dark .sidebar-link.active { background-color: #064e3b; color: #dcfce7; }
        .dark .sidebar-link.active i { color: #86efac; }
        .dark .bg-white { background-color: #0f172a !important; }
        .dark .bg-gray-50 { background-color: #0f172a !important; }
        .dark .bg-green-50 { background-color: #0f172a !important; }
        .dark .border-gray-100 { border-color: #334155 !important; }
        .dark .border-gray-200 { border-color: #334155 !important; }
        .dark .text-gray-900 { color: #f8fafc !important; }
        .dark .text-gray-800 { color: #e2e8f0 !important; }
        .dark .text-gray-700 { color: #cbd5e1 !important; }
        .dark .text-gray-500 { color: #94a3b8 !important; }
        .dark .text-gray-400 { color: #94a3b8 !important; }
        .dark .ring-gray-200 { border-color: #334155 !important; }
        .dark .placeholder\:text-gray-400::placeholder { color: #94a3b8 !important; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen dark:bg-slate-950 dark:text-slate-100">

    <div class="flex min-h-screen">

        <!-- ============ SIDEBAR ============ -->
        <aside class="w-64 bg-white border-r border-gray-100 shadow-sm flex-shrink-0 flex flex-col fixed top-0 left-0 h-full z-30 dark:bg-slate-900 dark:border-slate-700">
            <!-- Logo -->
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="bg-green-700 p-2 rounded-xl">
                        <i class="fas fa-leaf text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-base font-extrabold text-green-900 leading-tight">FoodSave</h1>
                        <p class="text-[10px] text-green-600 font-medium tracking-wide">Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- User Info -->
            <div class="px-4 py-4 border-b border-gray-100 dark:border-slate-800">
                <div class="flex items-center gap-3 bg-green-50 rounded-xl p-3 dark:bg-slate-800">
                    <div class="w-9 h-9 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-gray-800 dark:text-slate-100 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-slate-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 mb-2">Menu Utama</p>

                <a href="{{ route('kategori') }}"
                   class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-green-50 hover:text-green-700 transition-all group {{ request()->routeIs('kategori') ? 'active' : '' }}">
                    <i class="fas fa-home w-5 text-center text-gray-400 group-hover:text-green-600 transition-colors"></i>
                    <span class="text-sm font-semibold">Beranda</span>
                </a>

                <a href="{{ route('keranjang') }}"
                   class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-green-50 hover:text-green-700 transition-all group dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-green-300 {{ request()->routeIs('keranjang') ? 'active' : '' }}">
                    <i class="fas fa-shopping-basket w-5 text-center text-gray-400 group-hover:text-green-600 dark:group-hover:text-green-300 transition-colors"></i>
                    <span class="text-sm font-semibold">Keranjang</span>
                </a>

                <a href="{{ route('history') }}"
                   class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-green-50 hover:text-green-700 transition-all group {{ request()->routeIs('history') ? 'active' : '' }}">
                    <i class="fas fa-history w-5 text-center text-gray-400 group-hover:text-green-600 transition-colors"></i>
                    <span class="text-sm font-semibold">Riwayat Pesanan</span>
                </a>

                <div class="pt-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 mb-2">Akun</p>
                    <a href="{{ route('profil') }}"
                       class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-green-50 hover:text-green-700 transition-all group {{ request()->routeIs('profil*') ? 'active' : '' }}">
                        <i class="fas fa-user w-5 text-center text-gray-400 group-hover:text-green-600 transition-colors"></i>
                        <span class="text-sm font-semibold">Profil Saya</span>
                    </a>
                </div>
            </nav>

            <!-- Eco Badge -->
            <div class="px-4 py-3 border-t border-gray-100">
                <div class="bg-gradient-to-br from-green-600 to-teal-600 rounded-xl p-3 text-white">
                    <div class="flex items-center gap-2 mb-1">
                        <i class="fas fa-leaf text-green-200 text-sm"></i>
                        <span class="text-xs font-bold">Kontribusimu</span>
                    </div>
                    <p class="text-lg font-extrabold">2.4 kg</p>
                    <p class="text-[10px] text-green-200">Makanan diselamatkan</p>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 rounded-xl text-red-500 hover:bg-red-50 transition-all text-sm font-semibold">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- ============ MAIN CONTENT ============ -->
        <div class="flex-1 ml-64 flex flex-col min-h-screen">

            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-20 dark:bg-slate-900 dark:border-slate-700">
                <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-slate-300">
                        <i class="fas fa-map-marker-alt text-green-600"></i>
                        <span>Indonesia</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('keranjang') }}" class="relative p-2 text-gray-500 hover:text-green-600 transition-colors dark:text-slate-300 dark:hover:text-green-300">
                            <i class="fas fa-shopping-basket text-lg"></i>
                        </a>
                        <a href="{{ route('profil') }}" class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-bold hover:bg-green-700 transition-colors">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 max-w-6xl w-full mx-auto px-6 py-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 py-4 px-6 text-center text-xs text-gray-400 ml-0 dark:bg-slate-900 dark:border-slate-700 dark:text-slate-400">
                FoodSave Indonesia &copy; {{ date('Y') }} — Selamatkan Makanan, Selamatkan Bumi 🌱
            </footer>
        </div>

    </div>

</body>
</html>
