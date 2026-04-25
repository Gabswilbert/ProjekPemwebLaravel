<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>FoodSave Indonesia - Daftar Akun</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-surface text-on-surface font-body">
<main class="min-h-screen flex flex-col md:flex-row">
    <section class="w-full md:w-1/2 lg:w-2/5 bg-surface p-8 md:p-12 lg:p-20 flex flex-col justify-center">
        <div class="max-w-md mx-auto w-full">
            <h2 class="text-2xl font-headline font-bold text-on-surface mb-2">Buat Akun Baru</h2>
            <p class="text-on-surface-variant mb-8">Mulai selamatkan makanan surplus hari ini.</p>

            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6 text-sm font-medium">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <div class="space-y-1">
                    <label class="text-xs font-bold uppercase">Nama Lengkap</label>
                    <input name="name" type="text" class="w-full p-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary" value="{{ old('name') }}" required>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold uppercase">Email</label>
                    <input name="email" type="email" class="w-full p-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary" value="{{ old('email') }}" required>
                </div>
                
                <div class="space-y-1">
                    <label class="text-xs font-bold uppercase">Kata Sandi</label>
                    <input name="password" type="password" class="w-full p-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary" required>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold uppercase">Konfirmasi Kata Sandi</label>
                    <input name="password_confirmation" type="password" class="w-full p-4 bg-surface-container-lowest border-none ring-1 ring-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary" required>
                </div>
                
                <button type="submit" class="w-full py-4 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition-all">
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-on-surface-variant">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-primary font-bold">Masuk di sini</a>
            </p>
        </div>
    </section>

    <section class="hidden md:flex relative w-full md:w-1/2 lg:w-3/5 bg-primary-container p-16 flex-col justify-center">
         <h1 class="font-headline font-extrabold text-5xl text-on-primary leading-tight">
            Jadi Bagian dari <span class="text-primary-fixed">Perubahan.</span>
        </h1>
    </section>
</main>
</body>
</html>