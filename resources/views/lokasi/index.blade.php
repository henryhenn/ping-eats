@extends('layouts.main')

@section('title')
    Lokasi
@endsection

@section('content')
    <iframe class="mx-auto flex h-[400px] w-full" frameborder="0" style="border:0"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC6bsSJZ1PgWvV5NwBr9wSs1b4lxot2btM
    &q=Janji+Jiwa, {{ request('search') }}"
            allowfullscreen>
    </iframe>

    <div class="flex flex-col gap-8">
        <form class="mt-16 md:w-1/2 sm:w-full" action="{{ route('lokasi.index') }}" method="GET">
            <label for="default-search"
                   class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
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
                       placeholder="Masukkan Lokasimu di Sini...">
                <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </form>

        @foreach($users as $user)
            <div class="flex flex-col gap-16 text-secondary">
                <div class="p-6 rounded-lg bg-red-100 shadow-md hover:shadow-lg ease-in-out duration-300 mb-8 md:w-1/2 sm:w-full">
                    <div class="flex flex-row gap-4">
                        <div class="block my-auto">
                            <img src="{{ $user->profpict }}" alt="Product Images" width="150px" class="rounded-md">
                        </div>
                        <div>
                            <a href="{{ route('auth.detail', $user->id) }}" class="font-bold text-2xl hover:text-[#EF4444] ease-in-out duration-200">{{ $user->nama_dagang }}</a>
                            <p class="font-semibold text-lg mt-2">{{ $user->nama }}</p>
                            <p class="text-lg"><i class="fa-solid fa-location-dot"></i> {{ $user->lokasi }}</p>
                            <p class="mt-3"><i class="fa-solid fa-phone"></i> {{ $user->no_telp }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
