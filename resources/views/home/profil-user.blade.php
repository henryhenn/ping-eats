@extends('layouts.main')

@section('title')
    Profil: {{ $user->nama_dagang }}
@endsection

@section('content')
    <x-page-heading :title="'Profil Pedagang'"/>

    <div class="flex flex-wrap flex-col gap-16 mt-16 text-secondary">
        <div class="w-1/2 rounded-lg bg-red-50 mx-auto p-8 shadow-lg">
            <img src="{{ $user->profpict }}" class="mx-auto block rounded-lg">
            <h1 class="text-secondary mt-6 text-3xl font-bold">{{ $user->nama_dagang }}</h1>

            <div class="sm:text-md md:text-lg">
                <p class="text-secondary mt-6">Pemilik: <span class="font-semibold">{{ $user->nama }}</span></p>
                <p class="text-secondary mt-2">Lokasi: <span class="font-semibold">{{ $user->lokasi }}</span></p>
                <p class="text-secondary mt-2">Email: <span class="font-semibold">{{ $user->email }}</span></p>
                <p class="text-secondary mt-2">Telpon: <span class="font-semibold">{{ $user->no_telp }}</span></p>
            </div>
        </div>

        <div class="w-1/2 mx-auto">
            <h2 class="text-4xl font-semibold text-primary mb-8">Produk Dagangan</h2>
            @foreach($produk as $item)
                <div class="p-6 rounded-lg bg-gray-50 shadow-md hover:shadow-lg ease-in-out duration-300 mb-8">
                    <div class="flex flex-row gap-4">
                        <div class="block my-auto">
                            <img src="{{ $item->url_foto }}" alt="Product Images" class="rounded-md">
                        </div>
                        <div>
                            <p class="font-bold text-2xl">{{ $item->nama_produk }}</p>
                            <p class="font-semibold text-lg mt-4">Rp.{{ $item->harga }}</p>
                            <p class="mt-6">{{ $item->deskripsi }}</p>

                            <div class="mt-6 flex">
                                <button
                                    class="text-md block mr-4 rounded-lg bg-red-600 px-5 py-2 text-center font-medium text-white duration-300 ease-in-out hover:bg-red-800 focus:outline-none"
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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah
                                                    Anda Yakin Ingin PING Pedagang <span
                                                        class="font-semibold">{{ $user->nama_dagang }}</span>?
                                                </h3>
                                                <div class="flex justify-center flex-wrap">
                                                    <form action="{{ route('ping', $item->id) }}" method="post">
                                                        @csrf
                                                        <button data-modal-toggle="popup-modal" type="button"
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
                                <a href="{{ route('detail', $item->id) }}"
                                   class="rounded-lg bg-blue-600 px-5 py-2 font-semibold text-white duration-300 ease-in-out hover:bg-blue-800">
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-20">
                {{ $produk->links() }}
            </div>
        </div>
    </div>
@endsection
