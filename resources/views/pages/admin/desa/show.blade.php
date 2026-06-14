@extends('layouts.admin')

@section('title', 'Detail Desa')

@section('content')
<div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10 min-h-screen flex flex-col gap-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/60 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-100/50 text-blue-600 text-xs font-bold tracking-wide uppercase mb-3">
                <i class="fas fa-map-signs opacity-70"></i>
                Detail Wilayah
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">
                {{ $desa->nama_desa }}
            </h1>
            <p class="text-slate-500 mt-1 font-medium text-sm">Informasi lengkap mengenai wilayah desa ini.</p>
        </div>

        <div>
            <a href="{{route('admin.desa.index')}}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-600 font-bold px-5 py-3 rounded-xl shadow-sm border border-slate-200 transition-all hover:-translate-x-1">
                <i class="fas fa-arrow-left text-sm opacity-70"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        
        <div class="p-6 md:p-8">
            <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-info-circle"></i>
                </div>
                Informasi Desa
            </h3>

            <div class="bg-slate-50/50 rounded-2xl border border-slate-100 p-2">
                <div class="grid grid-cols-1 divide-y divide-slate-100/80">
                    
                    <div class="flex flex-col sm:flex-row p-4 hover:bg-white transition-colors rounded-xl">
                        <div class="w-full sm:w-1/3 md:w-1/4 text-sm font-bold text-slate-500 mb-1 sm:mb-0 flex items-center gap-2">
                            <i class="fas fa-tag text-slate-300 w-4 text-center"></i> Nama Desa
                        </div>
                        <div class="w-full sm:w-2/3 md:w-3/4 text-sm font-bold text-slate-800">
                            {{ $desa->nama_desa }}
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row p-4 hover:bg-white transition-colors rounded-xl">
                        <div class="w-full sm:w-1/3 md:w-1/4 text-sm font-bold text-slate-500 mb-1 sm:mb-0 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-slate-300 w-4 text-center"></i> Alamat Lengkap
                        </div>
                        <div class="w-full sm:w-2/3 md:w-3/4 text-sm text-slate-600 leading-relaxed">
                            {{ $desa->alamat_desa }}
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{route('admin.desa.edit', $desa->id)}}" class="inline-flex items-center gap-2 bg-amber-50 hover:bg-amber-100 text-amber-600 font-bold px-5 py-2.5 rounded-xl transition-colors border border-amber-200/50">
                    <i class="fas fa-edit text-sm"></i> Edit Data
                </a>
            </div>
        </div>
        
    </div>
</div>
@endsection