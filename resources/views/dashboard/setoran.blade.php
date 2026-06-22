<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-slate-800 leading-tight">
                {{ __('Pusat Penyetoran Minyak') }}
            </h2>
            <a href="{{ route('masyarakat.dashboard') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-colors flex items-center gap-2">
                ‹ Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 text-sm shadow-sm">
            <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="p-6 bg-gradient-to-br from-slate-900 to-slate-800 rounded-3xl text-white shadow-sm relative overflow-hidden">
                <div class="absolute right-0 bottom-0 translate-x-6 translate-y-6 opacity-10">
                    <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-1">Standar Nilai Tukar Jelantah ♻️</h3>
                <p class="text-slate-400 text-xs leading-relaxed max-w-xl">
                    Nilai insentif final akan dihitung kembali oleh petugas pengepul di lapangan menggunakan timbangan digital presisi serta pengecekan kualitas kejernihan minyak.
                </p>
            </div>

            <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
                <div class="p-5 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900">Daftar Hub Mitra Pengepul Tersedia</h3>
                    <p class="text-[11px] text-slate-500 mt-0.5">Urutan otomatis berdasarkan lokasi terdekat Anda & harga beli tertinggi.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-3 px-5">Nama Hub / Pengepul</th>
                                <th class="py-3 px-5 text-center">Jarak Lokasi</th>
                                <th class="py-3 px-5 text-right">Harga / Liter</th>
                                <th class="py-3 px-5 text-center">Kapasitas Gudang</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-600 font-medium">
                            @forelse($daftarPengepul as $pengepul)
                                <tr class="hover:bg-slate-50/50">
                                    <td class="py-3.5 px-5 text-slate-900 font-semibold">
                                        {{ $pengepul->name }}
                                    </td>
                                    <td class="py-3.5 px-5 text-center">
                                        @if(isset($pengepul->jarak))
                                            <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[10px] font-bold">
                                                📍 {{ number_format($pengepul->jarak, 1) }} Km
                                            </span>
                                        @else
                                            <span class="text-slate-400 italic text-[11px]">Lokasi belum diatur</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-5 text-right text-emerald-600 font-bold">
                                        Rp {{ number_format($pengepul->harga_per_liter ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3.5 px-5 text-center">
                                        <span class="px-2 py-0.5 rounded-md bg-amber-50 text-amber-700 text-[10px]">
                                            {{ $pengepul->kapasitas ?? '0' }} Liter
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-slate-400">Tidak ada mitra pengepul aktif saat ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
            <div class="mb-5">
                <h3 class="text-base font-bold text-slate-900">Formulir Pengajuan</h3>
                <p class="text-xs text-slate-500 mt-0.5">Isi data rencana penjemputan minyak.</p>
            </div>
            
            <form action="{{ route('masyarakat.setoran.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Mitra Pengepul (Hub)</label>
                    <select name="pengepul_id" required class="w-full text-sm rounded-xl border-slate-200 bg-slate-50/50 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors">
                        <option value="" disabled selected>-- Pilih Hub Terdekat --</option>
                        @foreach($daftarPengepul as $pengepul)
                            <option value="{{ $pengepul->id }}">
                                {{ $pengepul->name }} 
                                @if(isset($pengepul->jarak)) 
                                    - (📍 {{ number_format($pengepul->jarak, 1) }} Km)
                                @endif 
                                - Rp {{ number_format($pengepul->harga_per_liter ?? 0, 0, ',', '.') }}/L
                            </option>
                        @endforeach
                    </select>
                    @error('pengepul_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Perkiraan Volume (Liter)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <input type="number" step="0.1" min="1" name="liter_estimasi" required 
                            class="w-full text-sm rounded-xl border-slate-200 bg-slate-50/50 focus:border-emerald-500 focus:ring-emerald-500 transition-colors pr-12" 
                            placeholder="Contoh: 4.5">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <span class="text-xs font-semibold text-slate-400">Liter</span>
                        </div>
                    </div>
                    @error('liter_estimasi') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Rencana Tanggal Jemput</label>
                    <input type="date" name="tanggal_penjemputan" required 
                        min="{{ date('Y-m-d') }}"
                        class="w-full text-sm rounded-xl border-slate-200 bg-slate-50/50 focus:border-emerald-500 focus:ring-emerald-500 transition-colors">
                    @error('tanggal_penjemputan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full mt-2 py-3 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl shadow-md shadow-emerald-900/10 hover:shadow-emerald-900/20 transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    Ajukan Penjemputan
                </button>
            </form>
        </div>

    </div>
</x-app-layout>