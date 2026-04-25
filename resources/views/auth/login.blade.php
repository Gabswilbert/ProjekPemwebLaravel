<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>FoodSave Indonesia - Masuk</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-surface text-on-surface font-body">
<main class="min-h-screen flex flex-col md:row">
    <section class="relative w-full md:w-1/2 lg:w-3/5 bg-primary-container p-8 md:p-16 flex flex-col justify-between min-h-[353px]">
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-12">
                <span class="material-symbols-outlined text-on-primary text-3xl">eco</span>
                <span class="font-headline font-extrabold text-2xl text-on-primary">FoodSave Indonesia</span>
            </div>
            <h1 class="font-headline font-extrabold text-4xl md:text-6xl text-on-primary leading-tight">
                Selamat Datang <span class="text-primary-fixed">Kembali.</span>
            </h1>
        </div>
    </section>

    <section class="w-full md:w-1/2 lg:w-2/5 bg-surface p-8 md:p-12 lg:p-20 flex flex-col justify-center">
        <div class="max-w-md mx-auto w-full">
            <h2 class="text-2xl font-headline font-bold text-on-surface mb-8">Masuk ke Akun Anda</h2>

            @if(session('success'))
                <div class="bg-emerald-100 text-emerald-800 p-4 rounded-lg mb-6 text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6 text-sm font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf <div class="space-y-2">
                    <label class="block text-sm font-bold uppercase tracking-wide">Alamat Email</label>
                    <input name="email" type="email" class="w-full p-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary" value="{{ old('email') }}" required>
                </div>
                
                <div class="space-y-2">
                    <label class="block text-sm font-bold uppercase tracking-wide">Kata Sandi</label>
                    <input name="password" type="password" class="w-full p-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary" required>
                </div>
                
                <button type="submit" class="w-full py-4 bg-primary text-on-primary font-bold rounded-lg hover:scale-[1.02] transition-all">
                    Masuk Sekarang
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-on-surface-variant">
                Belum punya akun? <a href="{{ route('register') }}" class="text-primary font-bold">Daftar di sini</a>
            </p>
        </div>
    </section>
</main>
</body>
</html>