@extends('base.index')

@section('content')
    <div class="mt-5 mx-4">
        <h1 class="font-bold text-xl">Struk Transaksi</h1>
    </div>

    <section class="bg-white dark:bg-gray-900 shadow-xl mx-5">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white">Detail Transaksi</h2>
                    <ul class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        <li><strong>Kode Nota:</strong> {{ $nota->KodeNota }}</li>
                        <li><strong>Nama Tenan:</strong> {{ $nota->tenan->NamaTenan }}</li>
                        <li><strong>Nama Kasir:</strong> {{ $nota->kasir->Nama }}</li>
                        <!-- Tambahkan informasi lain sesuai kebutuhan -->
                    </ul>
                </div>

                <div>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white">Detail Barang</h2>
                    <ul class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        @foreach ($barangNota as $item)
                            <li>{{ $item->barang->NamaBarang }} - {{ $item->JumlahBarang }} pcs</li>
                        @endforeach
                    </ul>
                </div>

                <div class="sm:col-span-2">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white">Total Pembelian</h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        <strong>Total Belanja:</strong> Rp {{ $nota->JumlahBelanja }}
                    </p>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        <strong>Diskon:</strong> {{ $nota->Diskon }}%
                    </p>
                    <p class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">
                        <strong>Total:</strong> Rp {{ $nota->Total }}
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('transaksi.index') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Kembali ke Daftar Transaksi
                </a>
            </div>
        </div>
    </section>
@endsection
