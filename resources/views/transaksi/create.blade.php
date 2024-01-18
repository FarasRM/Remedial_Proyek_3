@extends('base.index')
@section('content')
<div class="mt-5 mx-4">
    <h1 class="font-bold text-xl">Tambah Transaksi</h1>
</div>

<section class="bg-white dark:bg-gray-900 shadow-xl mx-5">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="Kode_Nota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Nota</label>
                    <input type="text" name="Kode_Nota" id="Kode_Nota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                </div>

                <div>
                    <label for="category_tenan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Tenan</label>
                    <select id="category_tenan" name="Kode_Tenan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select Tenan</option>
                        @foreach ($tenan as $item)
                        <option value="{{ $item->KodeTenan }}">{{ $item->NamaTenan }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="category_kasir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kasir</label>
                    <select id="category_kasir" name="Kode_Kasir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select Kasir</option>
                        @foreach ($kasir as $item)
                        <option value="{{ $item->KodeKasir }}">{{ $item->Nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="category_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                    <select id="category_barang" name="Kode_Barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select Barang</option>
                        @foreach ($barang as $item)
                        <option value="{{ $item->kodeBarang }}">{{ $item->NamaBarang }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input type="number" name="Jumlah" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                </div>

                <div>
                    <label for="Diskon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon (%)</label>
                    <input type="number" name="Diskon" id="Diskon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                </div>

            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add
            </button>

        </form>
    </div>
</section>

</div>
@endsection
