@extends('layouts.main')

@section('title')
    Food Detail
@endsection

@section('content')
    <div class="flex flex-wrap justify-center">
        <div class="w-1/2">
            <img src="{{ $product->url_foto }}" class="mx-auto block rounded-lg">
            <h1 class="text-secondary mt-6 font-bold sm:text-3xl md:text-4xl">{{ $product->nama }}</h1>
            <div class="sm:text-md md:text-lg">
                <p class="text-secondary mt-6 mb-2 text-xl font-semibold">Rp.{{ $product->harga }}</p>
                <span class="text-secondary">Penjual:<a href="{{ route('auth.detail', $product->user->id) }}"
                                                        class="text-blue-700 hover:text-blue-800">
						{{ $product->user->nama_dagang }}</a></span>
                <p class="text-secondary mt-2">{{ $product->deskripsi }}</p>
            </div>
            @auth
                <button
                    class="text-md float-right mt-10 rounded-lg bg-blue-700 px-7 py-2.5 text-center font-semibold text-white duration-300 ease-in-out hover:bg-blue-800 focus:outline-none"
                    type="button" data-modal-toggle="buy-modal">
                    Beli
                </button>

                <div id="buy-modal" tabindex="-1" aria-hidden="true"
                     class="h-modal fixed top-0 right-0 left-0 z-50 hidden w-full overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
                    <div class="relative h-full w-full max-w-md p-4 md:h-auto">
                        <!-- Modal content -->
                        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                            <button type="button"
                                    class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-toggle="buy-modal">
                                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Konfirmasi
                                    Pemesanan Produk</h3>
                                <form id="transaction-form" action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <div class="space-y-6">
                                        <div>
                                            <label for="nama"
                                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                                Produk</label>
                                            <input type="hidden" name="produk_dagang_id" value="{{ $product->id }}">
                                            <input type="hidden" name="harga" value="{{ $product->harga }}">
                                            <input type="nama" name="nama" id="nama" readonly
                                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                                   value="{{ $product->nama }}">
                                        </div>
                                        <div>
                                            <label for="harga"
                                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Harga
                                                Produk</label>
                                            <input type="harga" name="harga" id="harga" readonly
                                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                                   value="{{ $product->harga }}">
                                        </div>
                                        <div>
                                            <label for="jumlah"
                                                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Masukkan
                                                Jumlah</label>
                                            <input type="number" min="1" onkeyup="setHarga()" onchange="setHarga()"
                                                   name="kuantitas_beli"
                                                   id="kuantitas"
                                                   class="block w-full rounded-lg @error('kuantitas_beli') border-red-500 ring-red-500 @enderror border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                                            @error('kuantitas_beli')
                                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="jumlah"
                                                   class="mb-2 block text-lg font-medium text-gray-900 dark:text-gray-300">Total
                                                Harga: Rp.<span id="jumlah" class="text-lg font-bold"></span></label>
                                        </div>

                                        <button type="submit" id="pay-button"
                                                class="text-md w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Checkout
                                            <i class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @else
            <a href="{{ route('auth.login') }}"
               class="hove:bg-blue-800 float-right mt-6 rounded-lg bg-blue-600 px-6 py-2.5 font-semibold text-white duration-300 ease-in-out">Login
                Untuk Membeli Produk</a>
        @endauth
    </div>
@endsection

@push('script')
    <script>
        function setHarga() {
            let harga = document.getElementById('harga').value;
            let jumlah = document.getElementById('jumlah');
            let kuantitas = document.getElementById('kuantitas').value;
            const total = harga * kuantitas;

            jumlah.textContent = total;
        }
    </script>
@endpush
