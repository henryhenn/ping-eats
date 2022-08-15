@extends('layouts.main')

@section('title')
    Transaksi
@endsection

@section('content')
    <x-page-heading :title="'Transaksi'"/>

    <div class="relative mt-10 overflow-x-auto rounded-lg">
        <table class="w-full text-secondary text-center bg-red-200">
            <thead class="md:text-lg sm:text-md">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                    Jenis Transaksi
                </th>
                <th scope="col" class="py-3 px-6">
                    Produk
                </th>
                <th scope="col" class="py-3 px-6">
                    Kuantitas Beli
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <th scope="col" class="py-3 px-6">
                    Dibuat Pada
                </th>
            </tr>
            </thead>
            <tbody class="text-center bg-red-50">
            @forelse ($transaksi as $key => $item)
                <tr>
                    <th scope="row" class="text-secondary whitespace-nowrap py-4 px-6 font-medium">
                        {{ $key+1 }}
                    </th>
                    <th scope="row" class="text-secondary font-bold whitespace-nowrap py-4 px-6 font-medium">
                        {{ $item->jenis_transaksi }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $item->produk_dagang->nama }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $item->kuantitas_beli }}
                    </td>
                    <td class="py-4 px-6">
                        @if($item->status == 'Belum Dikonfirmasi Gerobakan')
                            <div
                                class="px-5 py-2.5 bg-[#DC2626] rounded-md font-semibold text-white">{{ $item->status }}</div>
                        @elseif($item->status == 'Sedang Diantarkan' || $item->status == 'Sudah Selesai')
                            <div
                                class="px-5 py-2.5 bg-[#22C55E] rounded-md font-semibold text-white">{{ $item->status }}</div>
                        @elseif($item->status == 'Sudah Dikonfirmasi Gerobakan' || $item->status == 'Sedang Diproses Gerobakan')
                            <div
                                class="px-5 py-2.5 bg-[#FB923C] rounded-md font-semibold text-white">{{ $item->status }}</div>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        {{ $item->created_at }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="6" scope="row" class="text-secondary whitespace-nowrap py-4 px-6 font-medium">
                        <h2 class="text-center text-2xl font-bold">Tidak ada transaksi terbaru</h2>
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-8">
            {{ $transaksi->links() }}
        </div>
    </div>
@endsection
