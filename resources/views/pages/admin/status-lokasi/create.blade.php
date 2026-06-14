@extends('layouts.admin')

@section('title', 'Tambah Status Lokasi')

@section('content')
<div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10 min-h-screen flex flex-col gap-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/60 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-teal-50 border border-teal-100/50 text-teal-600 text-xs font-bold tracking-wide uppercase mb-3">
                <i class="fas fa-plus opacity-70"></i>
                Update Status Posko
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">
                Tambah Status Lokasi
            </h1>
            <p class="text-slate-500 mt-1 font-medium text-sm">Catat perubahan status terbaru untuk posko pengungsian ini.</p>
        </div>

        <div>
            <a href="{{ route('admin.lokasi.show', $lokasi->id) }}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-600 font-bold px-5 py-3 rounded-xl shadow-sm border border-slate-200 transition-all hover:-translate-x-1">
                <i class="fas fa-arrow-left text-sm opacity-70"></i> Batal / Kembali
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">

        <div class="p-6 md:p-8">
            <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                Form Log Status Baru
            </h3>

            <form action="{{ route('admin.status-lokasi.store') }}" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="lokasi_id" value="{{ $lokasi->id }}">

                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                    <!-- Left Column: Status & Catatan -->
                    <div class="space-y-6 bg-slate-50/50 rounded-2xl border border-slate-100 p-6">
                        <h4 class="text-sm font-bold text-slate-800 uppercase tracking-widest flex items-center gap-2 mb-4 border-b border-slate-200 pb-2">
                            <i class="fas fa-info-circle text-teal-500"></i> Detail Status
                        </h4>

                        <!-- Status Field -->
                        <div class="space-y-2">
                            <label for="status" class="block text-sm font-bold text-slate-700">Status Posko <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <i class="fas fa-flag text-slate-400"></i>
                                </div>
                                <select
                                    name="status"
                                    id="status"
                                    class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition-all appearance-none @error('status') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
                                >
                                    <option value="pending" @if (old('status') == 'pending') selected @endif>Pending</option>
                                    <option value="approved" @if (old('status') == 'approved') selected @endif>Approved</option>
                                    <option value="rejected" @if (old('status') == 'rejected') selected @endif>Rejected</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none z-10">
                                    <i class="fas fa-chevron-down text-slate-400 text-xs"></i>
                                </div>
                            </div>
                            @error('status')
                                <p class="mt-1.5 text-xs font-bold text-rose-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan Field -->
                        <div class="space-y-2">
                            <label for="catatan" class="block text-sm font-bold text-slate-700">Catatan / Keterangan</label>
                            <div class="relative">
                                <div class="absolute top-3.5 left-0 pl-4 flex items-start pointer-events-none z-10">
                                    <i class="fas fa-sticky-note text-slate-400 mt-0.5"></i>
                                </div>
                                <textarea id="catatan" name="catatan" rows="4"
                                    class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 transition-all @error('catatan') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
                                    placeholder="Tulis catatan atau keterangan tambahan untuk status ini...">{{ old('catatan') }}</textarea>
                            </div>
                            @error('catatan')
                                <p class="mt-1.5 text-xs font-bold text-rose-500 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column: Info Lokasi -->
                    <div class="space-y-6">
                        <div class="bg-teal-50/50 rounded-2xl border border-teal-100 p-6">
                            <h4 class="text-sm font-bold text-slate-800 uppercase tracking-widest flex items-center gap-2 mb-4 border-b border-teal-200/60 pb-2">
                                <i class="fas fa-campground text-teal-500"></i> Informasi Posko
                            </h4>
                            <div class="space-y-4">
                                <div class="bg-white rounded-xl p-4 border border-teal-100 shadow-sm">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Nama Lokasi</p>
                                    <p class="text-sm font-bold text-slate-700">{{ $lokasi->nama_lokasi }}</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 border border-teal-100 shadow-sm">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Desa</p>
                                    <p class="text-sm font-bold text-slate-700">{{ $lokasi->desa->nama_desa ?? '-' }}</p>
                                </div>
                                <div class="bg-white rounded-xl p-4 border border-teal-100 shadow-sm">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Kapasitas</p>
                                    <p class="text-sm font-bold text-slate-700">{{ number_format($lokasi->kapasitas_pengungsi, 0, ',', '.') }} Jiwa</p>
                                </div>
                            </div>
                        </div>

                        <!-- Status Info -->
                        <div class="bg-amber-50/50 rounded-2xl border border-amber-100 p-6">
                            <h4 class="text-sm font-bold text-slate-800 uppercase tracking-widest flex items-center gap-2 mb-3 border-b border-amber-200/60 pb-2">
                                <i class="fas fa-lightbulb text-amber-500"></i> Panduan Status
                            </h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-amber-400 flex-shrink-0"></span>
                                    <span class="text-slate-600 font-medium"><strong class="text-slate-700">Pending</strong> — Menunggu verifikasi.</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 flex-shrink-0"></span>
                                    <span class="text-slate-600 font-medium"><strong class="text-slate-700">Approved</strong> — Posko resmi beroperasi.</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-rose-500 flex-shrink-0"></span>
                                    <span class="text-slate-600 font-medium"><strong class="text-slate-700">Rejected</strong> — Ditolak / tidak disetujui.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-4 mt-4 border-t border-slate-100">
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-tr from-teal-600 to-emerald-500 hover:from-teal-700 hover:to-emerald-600 text-white font-bold px-8 py-4 rounded-xl shadow-lg shadow-teal-500/30 transform transition-all hover:-translate-y-1 border border-teal-400/20 text-lg">
                        <i class="fas fa-paper-plane"></i> Simpan Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection