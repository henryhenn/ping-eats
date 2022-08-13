@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <div class="rounded-lg bg-red-400 py-10 px-14">
        <x-page-heading :title="'Selamat Datang di Website Produk Pedagang Kaki Lima'" :class="'text-white'"/>
    </div>

    <div class="flex">
        <form class="mt-16 w-1/2" action="{{ route('home') }}" method="GET">
            <label for="default-search"
                   class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search" name="search"
                       class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Cari Nama Makanan di Sini...">
                <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </form>
    </div>

    @if ($products->count())
        <div class="mt-24 grid justify-between gap-10 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($products as $product)
                <div class="group rounded-lg bg-gray-100 p-8 shadow-md duration-300 ease-in-out hover:shadow-lg">
                    <img src="{{ $product->url_foto }}" class="mx-auto flex rounded-sm">
                    <div class="mt-6">
                        <p class="text-secondary mb-4 text-3xl font-bold group-hover:text-[#111827]">{{ $product->nama }}</p>
                        <p class="text-secondary mb-3 text-lg font-semibold group-hover:text-[#111827]">
                            Rp.{{ $product->harga }}</p>
                        <p class="text-secondary group-hover:text-[#111827]">{{ $product->deskripsi }}</p>
                    </div>
                    <div class="mt-4">
                        <small class="text-secondary block">Penjual: <a
                                href="{{ route('auth.detail', $product->user->id) }}"
                                class="text-blue-700 hover:text-blue-800">
                                {{ $product->user->nama_dagang }}</a>
                        </small>
                        <div class="mt-8 flex flex-wrap justify-between">
                            <button
                                class="text-md block rounded-lg bg-red-600 px-5 py-2.5 text-center font-medium text-white duration-300 ease-in-out hover:bg-red-800 focus:outline-none"
                                type="button" data-modal-toggle="ping-modal">
                                PING
                            </button>
                            <div id="ping-modal" tabindex="-1"
                                 class="h-modal text-secondary fixed top-0 right-0 left-0 z-50 hidden overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-toggle="ping-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true"
                                                 class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah
                                                Anda Yakin Ingin PING Pedagang <span class="font-semibold">{{ $product->user->nama_dagang }}</span>?</h3>
                                            <div class="flex justify-center flex-wrap">
                                                <form action="{{ route('ping', $product->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yakin
                                                    </button>
                                                </form>
                                                <button data-modal-toggle="ping-modal" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Batalkan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('detail', $product->id) }}"
                               class="rounded-lg bg-blue-600 px-6 py-2.5 font-semibold text-white duration-300 ease-in-out hover:bg-blue-800">
                                Check <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h2 class="text-secondary mt-8 text-center text-4xl font-bold">Tidak ada produk terbaru</h2>
    @endif
@endsection


@push('script')
    <script>
        function setAlamat() {
            const alamat = document.querySelector("#alamat");
            const checkbox = document.querySelector("#checkbox");

            if (checkbox.checked === true) {
                alamat.classList.add("hidden");
            } else {
                alamat.classList.remove('hidden')
            }
        }
    </script>
@endpush
