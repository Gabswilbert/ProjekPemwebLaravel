<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodSave Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-md mx-auto min-h-screen bg-white shadow-lg relative pb-20">
        @yield('content')

        <nav class="fixed bottom-0 max-w-md w-full bg-white border-t border-gray-100 flex justify-around py-3">
            <a href="{{ route('kategori') }}" class="text-green-600 flex flex-col items-center"><i class="fas fa-home"></i><span class="text-xs">Beranda</span></a>
            <a href="{{ route('keranjang') }}" class="text-gray-400 flex flex-col items-center hover:text-green-600"><i class="fas fa-shopping-basket"></i><span class="text-xs">Keranjang</span></a>
            <a href="{{ route('history') }}" class="text-gray-400 flex flex-col items-center hover:text-green-600"><i class="fas fa-history"></i><span class="text-xs">Riwayat</span></a>
            <a href="{{ route('profil') }}" class="text-gray-400 flex flex-col items-center hover:text-green-600"><i class="fas fa-user"></i><span class="text-xs">Profil</span></a>
        </nav>
    </div>
</body>
</html>