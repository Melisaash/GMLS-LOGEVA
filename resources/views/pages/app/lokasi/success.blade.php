@extends('layouts.auth')

@section('title', 'Berhasil')

@section('content')
<div class="min-h-[75vh] flex flex-col justify-center items-center p-6">
    <div id="lottie" class="w-64 h-64"></div>

    <h6 class="text-xl font-bold text-center mb-2 text-gray-800">Lokasi Pengungsian Berhasil Ditambahkan</h6>
    <p class="text-center mb-6 text-gray-600 max-w-md">Kamu bisa melihat Lokasi Pengungsian di halaman Lokasi</p>

    <a href="{{ route('lokasi.mylokasi', ['status' => 'pending']) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300">
        Lihat Laporan
    </a>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'assets/lottie/success.json'
        })
    </script>
@endsection