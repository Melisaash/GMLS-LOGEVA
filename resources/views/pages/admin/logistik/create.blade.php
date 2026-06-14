@extends('layouts.app')

@section('title', 'Tambah Logistik')

@section('content')

<div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Item Logistik
    </h1>

    <form action="{{ route('admin.logistik.store') }}"
          method="POST">

        @csrf

        <div class="mb-4">
    <label class="block mb-2 font-semibold">
        Kategori
    </label>

    <select name="kategori_logistik_id"
            class="w-full border rounded-lg p-3"
            required>

        @foreach($kategoris as $kategori)

            <option value="{{ $kategori->id }}">
                {{ $kategori->nama_kategori }}
            </option>

        @endforeach

    </select>
</div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Nama Item
            </label>

            <input type="text"
                   name="nama_item"
                   class="w-full border rounded-xl p-3"
                   required>

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Satuan
            </label>

            <input type="text"
                   name="satuan"
                   placeholder="Contoh: liter, kg, dus"
                   class="w-full border rounded-xl p-3"
                   required>

        </div>

        <div class="mb-4">

    <label class="block mb-2 font-semibold">
        Kebutuhan Harian
    </label>

    <input type="number"
           step="0.01"
           name="kebutuhan_harian"
           placeholder="Contoh: 50"
           class="w-full border rounded-xl p-3">

    <small class="text-slate-500">
        Kebutuhan rata-rata per hari untuk item ini
    </small>

</div>

        <div class="flex items-center gap-3">

            <button type="submit"
                    class="px-6 py-3 bg-red-600 hover:bg-red-700
                    text-white rounded-xl font-semibold">

                Simpan

            </button>

            <a href="{{ route('admin.logistik.index') }}"
               class="px-6 py-3 bg-slate-200 hover:bg-slate-300
               text-slate-700 rounded-xl font-semibold">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection