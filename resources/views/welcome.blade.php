<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JelantahHub - PT Hijau Energi Nusantara</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50 text-slate-800 selection:bg-emerald-500 selection:text-white">
        
        <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-lg font-bold tracking-tight text-slate-900 block leading-none">JelantahHub</span>
                        <span class="text-[11px] text-emerald-600 font-medium tracking-wider uppercase">PT Hijau Energi Nusantara</span>
                    </div>
                </div>

                @if (Route::has('login'))
                    <nav class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 rounded-xl transition-all shadow-md shadow-emerald-100">
                                Dashboard Sistem
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-emerald-600 transition-colors">
                                Masuk
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-sm">
                                    Mulai Berkontribusi
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <section class="pt-40 pb-20 overflow-hidden relative">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-emerald-50 via-slate-50 to-slate-50 -z-10"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-100/80 text-emerald-800 text-xs font-semibold mb-6 tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Sustainable Aviation Fuel (SAF) Ecosystem
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight sm:leading-none mb-6">
                        Ubah Minyak Jelantah Menjadi <span class="text-emerald-600">Energi Penerbangan</span> Masa Depan
                    </h1>
                    
                    <p class="text-lg text-slate-600 mb-10 leading-relaxed">
                        Platform transparansi rantai pasok digital terintegrasi untuk mengumpulkan, memvalidasi mutu, dan menyalurkan bahan baku avtur ramah lingkungan di Indonesia.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-emerald-600 hover:bg-emerald-700 rounded-2xl transition-all shadow-lg shadow-emerald-200 hover:-translate-y-0.5">
                            Daftar Sebagai Penyetor
                        </a>
                        <a href="#alur" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 rounded-2xl transition-all hover:-translate-y-0.5">
                            Pelajari Alur Supply Chain
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 bg-white border-y border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">98.4%</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Akurasi Prediksi Dana AI</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">0 Liters</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Minyak Terkumpul</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">0</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pengepul Terverifikasi</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-slate-900 mb-1">Haversine</div>
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Sistem Matriks Jarak Peta</div>
                    </div>
                </div>
            </div>
        </section>

        <section id="alur" class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight sm:text-4xl mb-4">
                        Ekosistem Pengumpulan Berbasis Peran (RBAC)
                    </h2>
                    <p class="text-slate-600">
                        Platform dirancang khusus untuk menghubungkan 3 pilar utama rantai pasok secara transparan dan akuntabel.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-6 font-bold text-lg">01</div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">Masyarakat / Penyetor</h3>
                            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                                Rumah tangga, UMKM kuliner, atau restoran dapat mendaftarkan titik koordinat lokasinya, memilih pengepul terdekat dengan penawaran harga terbaik, dan memantau volume bersih aktual serta nominal dana yang akan diterima secara real-time.
                            </p>
                        </div>
                        <div class="border-t border-slate-100 pt-4 text-xs font-semibold text-blue-600 tracking-wide uppercase">
                            Akses: Peta Pengepul & Pengajuan Setoran
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-6 font-bold text-lg">02</div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">Jaringan Pengepul</h3>
                            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                                Bertindak sebagai filter pertama penyaringan endapan minyak. Pengepul mengelola penetapan harga beli mandiri (mengacu pada harga acuan pusat), memvalidasi volume kotor/bersih masyarakat, lalu mengajukan total pasokan kolektif ke kilang HEN.
                            </p>
                        </div>
                        <div class="border-t border-slate-100 pt-4 text-xs font-semibold text-amber-600 tracking-wide uppercase">
                            Akses: Manajemen Anggota & Validasi Berjenjang
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6 font-bold text-lg">03</div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">Refinery Stakeholder (HEN)</h3>
                            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                                Pemegang kendali penuh ekosistem. Menetapkan standarisasi lokasi penerimaan pusat & harga acuan utama, mengelola modul Laboratorium Mutu (CRUD parameter Kadar Air, FFA, & Kotoran), serta memantau visualisasi peta sebaran nasional dan analisis prediktif dana AI.
                            </p>
                        </div>
                        <div class="border-t border-slate-100 pt-4 text-xs font-semibold text-emerald-600 tracking-wide uppercase">
                            Akses: Lab Quality Control, Dashboard Peta & AI
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-white border-t border-slate-100 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-xs text-slate-400">
                    &copy; 2026 PT Hijau Energi Nusantara (HEN). Dikembangkan untuk Pelaksanaan Kompetisi PLAY IT 2026. All rights reserved.
                </p>
            </div>
        </footer>

    </body>
</html>