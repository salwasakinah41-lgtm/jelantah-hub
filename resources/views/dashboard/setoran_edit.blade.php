<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('Perbarui Rencana Penyetoran') }}
        </h2>
    </x-slot>

    <div class="max-w-xl bg-white p-6 rounded-3xl border border-slate-200 shadow-sm mx-auto">
        <div class="mb-5">
            <h3 class="text-base font-bold text-slate-900">Form Perubahan Data</h3>
            <p class="text-xs text-slate-500 mt-0.5">Anda hanya dapat mengubah data jika statusnya masih dalam antrean (Pending).</p>
        </div>
        
        <form action="{{ route('masyarakat.setoran.update', $setoran->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Mitra Pengepul (Hub)</label>
                <select name="pengepul_id" required class="w-full text-sm rounded-xl border-slate-200 bg-slate-50/50 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition-colors">
                    @foreach($daftarPengepul as $pengepul)
                        <option value="{{ $pengepul->id }}" {{ $setoran->pengepul_id == $pengepul->id ? 'selected' : '' }}>
                            {{ $pengepul->name }}
                        </option>
                    @endforeach
                </select>
                @error('pengepul_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Perkiraan Volume (Liter)</label>
                <div class="relative rounded-xl shadow-sm">
                    <input type="number" step="0.1" min="1" name="liter_estimasi" value="{{ old('liter_estimasi', $setoran->liter_estimasi) }}" required 
                        class="w-full text-sm rounded-xl border-slate-200 bg-slate-50/50 focus:border-emerald-500 focus:ring-emerald-500 transition-colors pr-12">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-xs font-semibold text-slate-400">Liter</span>
                    </div>
                </div>
                @error('liter_estimasi') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Rencana Tanggal Jemput</label>
                <input type="date" name="tanggal_penjemputan" value="{{ old('tanggal_penjemputan', $setoran->tanggal_penjemputan ? $setoran->tanggal_penjemputan->format('Y-m-d') : '') }}" required 
                    min="{{ date('Y-m-d') }}"
                    class="w-full text-sm rounded-xl border-slate-200 bg-slate-50/50 focus:border-emerald-500 focus:ring-emerald-500 transition-colors">
                @error('tanggal_penjemputan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <a href="{{ route('masyarakat.dashboard') }}" class="w-1/2 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-xl text-center transition-colors">
                    Kembali
                </a>
                <button type="submit" class="w-1/2 py-3 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold rounded-xl shadow-md shadow-emerald-900/10 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>