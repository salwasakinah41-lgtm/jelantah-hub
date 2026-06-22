<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg text-slate-800 leading-tight">
            Pusat Kendali Logistik Hub Pengepul
        </h2>
    </x-slot>

    <div class="mb-8 p-6 bg-gradient-to-r from-indigo-600 to-blue-700 rounded-3xl text-white shadow-xl shadow-indigo-100 relative overflow-hidden">
        <div class="absolute right-0 top-0 translate-x-4 -translate-y-4 opacity-10">
            <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 8h-3V4H3v12h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2V8h-3zM6 16.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5 0.67 1.5 1.5-.67 1.5-1.5 1.5zm12 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5 0.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
            </svg>
        </div>
        <div class="relative z-10 max-w-xl">
            <h1 class="text-2xl font-bold mb-1">Selamat Bertugas, {{ Auth::user()->name }}! 🚚</h1>
            <p class="text-indigo-100 text-sm leading-relaxed">
                Panel ini memuat seluruh data pasokan minyak jalantah yang masuk dari masyarakat. Pastikan volume timbangan akurat sebelum melakukan verifikasi pencairan dana.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
        
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="p-3.5 rounded-xl bg-indigo-50 text-indigo-600 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Stok Tangki</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-0.5">1,420.5 <span class="text-sm font-medium text-slate-500">Liter</span></h3>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="p-3.5 rounded-xl bg-amber-50 text-amber-600 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Antrean Penjemputan</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-0.5">8 <span class="text-sm font-medium text-slate-500">Lokasi</span></h3>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4 sm:col-span-2 lg:col-span-1">
            <div class="p-3.5 rounded-xl bg-emerald-50 text-emerald-600 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M3.75 20.25zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kas Dana Cair</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-0.5"><span class="text-sm font-semibold text-slate-500">Rp</span> 11.3M</h3>
            </div>
        </div>

    </div>

    <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between flex-wrap gap-4">
            <div>
                <h3 class="text-base font-bold text-slate-900">Antrean Verifikasi & Setoran Masuk</h3>
                <p class="text-xs text-slate-500 mt-0.5">Daftar berkas pengajuan minyak dari warga yang harus dikonfirmasi.</p>
            </div>
            <div class="flex gap-2">
                <button class="inline-flex items-center gap-2 px-4 py-2 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                    Filter Status
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
                        <th class="py-3 px-6">Nama Penyetor</th>
                        <th class="py-3 px-6">Tanggal Masuk</th>
                        <th class="py-3 px-6 text-right">Estimasi Volume</th>
                        <th class="py-3 px-6 text-right">Nilai Tukar</th>
                        <th class="py-3 px-6 text-center">Status Berkas</th>
                        <th class="py-3 px-6 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-900">Fikri Syahban</span>
                                <span class="text-xs text-slate-400">Kec. Serengan, Solo</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">22 Juni 2026</td>
                        <td class="py-4 px-6 text-right font-semibold text-slate-900">12.0 Liter</td>
                        <td class="py-4 px-6 text-right font-bold text-slate-800">Rp 96,000</td>
                        <td class="py-4 px-6 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                Perlu Dijemput
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <button class="inline-flex items-center px-3 py-1.5 text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors shadow-sm">
                                Ambil Setoran
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-900">Budi Santoso</span>
                                <span class="text-xs text-slate-400">Kec. Laweyan, Solo</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">20 Juni 2026</td>
                        <td class="py-4 px-6 text-right font-semibold text-slate-900">25.0 Liter</td>
                        <td class="py-4 px-6 text-right font-bold text-slate-800">Rp 200,000</td>
                        <td class="py-4 px-6 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                Selesai / Masuk Tangki
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="text-xs font-medium text-slate-400 italic">Sudah Diverifikasi</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>