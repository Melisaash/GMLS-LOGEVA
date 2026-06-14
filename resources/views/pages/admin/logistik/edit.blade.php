@extends('layouts.admin')

@section('content')
<div class="max-w-6x3 mx-auto mt-6">

    <div class="bg-white shadow rounded-xl p-6">

        <h2 class="text-xl font-semibold mb-6">Edit Data Logistik</h2>

        <form action="{{ route('admin.logistik.update', $logistik->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Item -->
            <div>
                <label class="block text-sm font-medium mb-1">Nama Item</label>
                <input type="text" name="nama_item"
                       value="{{ $logistik->nama_item }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <!-- Satuan -->
            <div>
                <label class="block text-sm font-medium mb-1">Satuan</label>
                <input type="text" name="satuan"
                       value="{{ $logistik->satuan }}"
                       class="w-full border rounded-lg p-2">
            </div>
            
    

            <!-- Kebutuhan Harian -->
<div>
    <label class="block text-sm font-medium mb-1">
        Kebutuhan Harian
    </label>

    <input type="number"
           step="0.01"
           name="kebutuhan_harian"
           value="{{ $logistik->kebutuhan_harian }}"
           class="w-full border rounded-lg p-2">

    <small class="text-gray-500">
        Kebutuhan rata-rata per hari
    </small>
</div>

            <!-- Button -->
            <div class="flex justify-between pt-4 gap-2">
                <a href="{{ route('admin.logistik.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                    Kembali
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg">
                    Update Data
                </button>
            </div>

        </form>

    </div>
</div>
@endsection