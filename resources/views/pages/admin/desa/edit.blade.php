@extends('layouts.admin')

@section('title', 'Edit Data Desa')

@section('content')
<div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10 min-h-screen flex flex-col gap-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/60 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-50 border border-amber-100/50 text-amber-600 text-xs font-bold tracking-wide uppercase mb-3">
                <i class="fas fa-edit opacity-70"></i>
                Pembaruan Data
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">
                Edit Desa: {{ $desa->nama_desa }}
            </h1>
            <p class="text-slate-500 mt-1 font-medium text-sm">Ubah informasi wilayah desa yang telah terdaftar dalam sistem.</p>
        </div>

        <div>
            <a href="{{route('admin.desa.index')}}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-600 font-bold px-5 py-3 rounded-xl shadow-sm border border-slate-200 transition-all hover:-translate-x-1">
                <i class="fas fa-arrow-left text-sm opacity-70"></i> Batal / Kembali
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        
        <div class="p-6 md:p-8">
            <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-keyboard"></i>
                </div>
                Formulir Edit Desa
            </h3>

            <form action="{{route('admin.desa.update', $desa->id)}}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-slate-50/50 rounded-2xl border border-slate-100 p-6 space-y-6">
                    <!-- Nama Desa Field -->
                    <div class="space-y-2">
                        <label for="nama_desa" class="block text-sm font-bold text-slate-700">Nama Desa <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-slate-400"></i>
                            </div>
                            <input type="text" id="nama_desa" name="nama_desa" 
                                value="{{ old('nama_desa', $desa->nama_desa) }}"
                                class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all @error('nama_desa') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
                                placeholder="Contoh: Desa Suka Maju">
                        </div>
                        @error('nama_desa')
                            <p class="mt-1.5 text-xs font-bold text-rose-500 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Alamat Desa Field -->
                    <div class="space-y-2">
                        <label for="alamat_desa" class="block text-sm font-bold text-slate-700">Alamat Lengkap <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute top-3.5 left-0 pl-4 flex items-start pointer-events-none">
                                <i class="fas fa-map-marker-alt text-slate-400 mt-1"></i>
                            </div>
                            <textarea id="alamat_desa" name="alamat_desa" rows="3"
                                class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all @error('alamat_desa') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
                                placeholder="Masukkan alamat lengkap desa...">{{ old('alamat_desa', $desa->alamat_desa) }}</textarea>
                        </div>
                        @error('alamat_desa')
                            <p class="mt-1.5 text-xs font-bold text-rose-500 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-4 mt-6 border-t border-slate-100">
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-tr from-blue-600 to-indigo-500 hover:from-blue-700 hover:to-indigo-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-blue-500/30 transform transition-all hover:-translate-y-0.5 border border-blue-400/20">
                        <i class="fas fa-save text-sm"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection