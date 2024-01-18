@extends('base.index')
@section('content')
<div class="mt-5 mx-4">
    <h1 class="font-bold text-xl">Tambah Data Barang</h1>
</div>

<div class="mt-3 mx-5">
    <form class="max-w-sm mx-auto" action="{{route("barang.store")}}" method="post">
        @csrf
        <div class="mb-5">
          <label for="KodeBarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Barang</label>
          <input type="text" name="kodebarang" id="KodeBarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="NamaBarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
            <input type="text" name="namabarang" id="NamaBarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="Satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
            <input type="text" name="satuan" id="Satuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>
          <div class="mb-5">
            <label for="NamaBarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Satuan</label>
            <input type="text" name="hargasatuan" id="NamaBarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>
          <div class="mb-5">
            <label for="Stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
            <input type="text" name="stok" id="Stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>
        <button type="submit" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
</div>

@endsection
