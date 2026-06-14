@extends('layouts.admin')

@section('title', 'Data Desa')

@section('content')
<div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10 min-h-screen flex flex-col gap-8">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/60 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-100/50 text-blue-600 text-xs font-bold tracking-wide uppercase mb-3">
                <i class="fas fa-map-signs opacity-70"></i>
                Manajemen Wilayah
            </div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight">
                Data Desa
            </h1>
            <p class="text-slate-500 mt-1 font-medium text-sm">Kelola informasi wilayah desa yang terdaftar dalam sistem.</p>
        </div>

        <div>
            <a href="{{route('admin.desa.create')}}" class="inline-flex items-center gap-2 bg-gradient-to-tr from-blue-600 to-indigo-500 hover:from-blue-700 hover:to-indigo-600 text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-blue-500/30 transform transition-transform duration-300 hover:scale-[1.02] border border-blue-400/20">
                <i class="fas fa-plus text-sm"></i> Tambah Desa
            </a>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="p-6 md:p-8">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="dataTable">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100 rounded-tl-2xl">No</th>
                            <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">Nama Desa</th>
                            <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">Alamat Lengkap</th>
                            <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100 rounded-tr-2xl text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100/80 bg-white">
                        @foreach ($desas as $desa)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="py-4 px-6 text-sm font-semibold text-slate-500">{{$loop->iteration}}</td>
                            <td class="py-4 px-6 text-sm font-bold text-slate-800">{{$desa->nama_desa}}</td>
                            <td class="py-4 px-6 text-sm text-slate-600">
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-map-marker-alt text-slate-300 mt-0.5"></i>
                                    <span class="line-clamp-2 max-w-md" title="{{$desa->alamat_desa}}">{{$desa->alamat_desa}}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                    <a href="{{route('admin.desa.show', $desa->id)}}" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors border border-blue-100" title="Lihat">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                    <a href="{{route('admin.desa.edit', $desa->id)}}" class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white transition-colors border border-amber-100" title="Edit">
                                        <i class="fas fa-edit text-xs"></i>
                                    </a>
                                    <form action="{{route('admin.desa.destroy', $desa->id)}}" method="POST" class="inline-block m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center hover:bg-rose-600 hover:text-white transition-colors border border-rose-100" title="Hapus">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection