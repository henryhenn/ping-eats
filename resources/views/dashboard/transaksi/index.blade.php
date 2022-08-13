@extends('layouts.main')

@section('title')
    Daftar Transaksi
@endsection

@section('content')
    <x-page-heading :title="'Daftar Transaksi'"/>

    <div class="relative mt-14 overflow-x-auto rounded-lg">
        <table id="http-response" class="w-full text-left text-sm bg-red-200 text-gray-500">
            <thead class="sm:text-md text-secondary text-center md:text-lg">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                    Jenis Transaksi
                </th>
                <th scope="col" class="py-3 px-6">
                    Nama Produk
                </th>
                <th scope="col" class="py-3 px-6">
                    Pembeli
                </th>
                <th scope="col" class="py-3 px-6">
                    Alamat
                </th>
                <th scope="col" class="py-3 px-6">
                    Kuantitas Beli
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <th scope="col" class="py-3 px-6">
                    Tanggal & Waktu
                </th>
                <th scope="col" class="py-3 px-6">
                    Aksi
                </th>
            </tr>
            </thead>
            <tbody class="bg-red-50 text-center" id="transaksi">
            @foreach($transaksi as $key=> $item)
                <tr class="text-secondary text-md bg-white py-4 px-6 font-medium">
                    <td class='py-4 px-6'>{{ $key+1 }}</td>
                    <td class='py-4 px-6 font-bold'>{{ $item->jenis_transaksi }}</td>
                    <td class='py-4 px-6'>{{ $item->nama_produk }}</td>
                    <td class='py-4 px-6'>{{ $item->nama_user }}</td>
                    <td class='py-4 px-6'>{{ $item->lokasi_user }}</td>
                    <td class='py-4 px-6'>{{ $item->kuantitas_beli }}</td>
                    <td class='py-4 px-6'>
                        @if($item->status == 'Belum Dikonfirmasi Gerobakan')
                            <div
                                class="px-5 py-2 bg-[#DC2626] rounded-md font-semibold text-white">{{ $item->status }}</div>
                        @elseif($item->status == 'Sedang Diantarkan' || $item->status == 'Sudah Selesai')
                            <div
                                class="px-5 py-2 bg-[#22C55E] rounded-md font-semibold text-white">{{ $item->status }}</div>
                        @elseif($item->status == 'Sudah Dikonfirmasi Gerobakan' || $item->status == 'Sedang Diproses Gerobakan')
                            <div
                                class="px-5 py-2 bg-[#FB923C] rounded-md font-semibold text-white">{{ $item->status }}</div>
                        @endif
                    </td>
                    <td class='py-4 px-6'>{{ $item->created_at }}</td>
                    <td class="py-4 px-6">
                        @if($item->status !== 'Belum Dikonfirmasi Gerobakan')
                            <button
                                {{ $item->status == 'Sudah Selesai'? 'disabled': '' }}
                                class="ml-3 text-white block rounded {{ $item->status == 'Sudah Selesai'? 'bg-gray-300 cursor-not-allowed' : ' bg-red-600 duration-300 ease-in-out hover:-translate-y-1' }} px-4 py-2 text-center text-sm font-medium focus:outline-none"
                                type="button" data-modal-toggle="delete-modal{{ $item->id }}">
                                Update Status
                            </button>
                            <div id="delete-modal{{ $item->id }}" tabindex="-1"
                                 class="h-modal fixed top-0 right-0 left-0 z-50 hidden overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
                                <div class="relative h-full w-full max-w-md p-4 md:h-auto">
                                    <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-toggle="delete-modal{{ $item->id }}">
                                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor"
                                                 viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="py-6 px-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                                                Update Status Pemesanan</h3>
                                            <form class="space-y-6" action="{{ route('transaksi.update', $item->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="status"
                                                           class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Status
                                                        Pesanan</label>
                                                    <select id="countries" name="status"
                                                            class="bg-gray-50 border border-gray-300 @error('status') border-red-500 ring-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="Sedang Diproses Gerobakan">Sedang Diproses
                                                            Gerobakan
                                                        </option>
                                                        <option value="Sedang Diantarkan">Sedang Diantarkan</option>
                                                        <option value="Sudah Selesai">Sudah Selesai</option>
                                                    </select>
                                                    @error('status')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                            class="font-medium">{{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <form action="{{ route('transaksi.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Sudah Dikonfirmasi Gerobakan">
                                <button
                                    class="ml-3 block rounded bg-red-600 px-4 py-2 text-center text-sm font-medium text-white duration-300 ease-in-out hover:-translate-y-1 focus:outline-none"
                                    type="submit">
                                    Konfirmasi Pesanan
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        {{ $transaksi->links() }}
    </div>
@endsection

