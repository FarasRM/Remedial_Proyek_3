@extends('base.index')
@section('content')
<div class="mt-5 mx-4">
    <h1 class="font-bold text-xl">Kelola Nota</h1>
</div>

<div class="mt-3 mx-5">
    <div class="text-right">
    <a href="{{ route("transaksi.create") }}" type="button" class="mb-2 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah Transaksi</a>
    </div>
<div class="relative overflow-x-auto shadow-xl">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Kode Nota
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Tenan
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kasir
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah Belanja
                </th>
                <th scope="col" class="px-6 py-3">
                    Diskon (%)
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($nota as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$item->KodeNota}}
                </th>
                <td class="px-6 py-4">
                    {{$item->NamaBarang}}
                </td>
                <td class="px-6 py-4">
                    {{$item->Satuan}}
                </td>
                <td class="px-6 py-4">
                    {{$item->HargaSatuan}}
                </td>
                <td class="px-6 py-4">
                    {{$item->Stok}}
                </td>
                <td class="px-6 py-4">
                </td>

            </tr>
            @empty
            <tr>
                <th colspan="7" class="text-center p-2"> Data Not Found</th>
            </tr>
            @endforelse



        </tbody>
    </table>
</div>

</div>
@endsection
