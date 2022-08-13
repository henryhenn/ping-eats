@extends('layouts.main')

@section('title')
	Dashboard Produk
@endsection

@section('content')
	<x-page-heading :title="'Daftar Produk'" />
	<!-- Modal toggle -->
	<button
		class="text-md mt-14 block rounded-lg bg-blue-700 px-5 py-2.5 text-center font-semibold text-white duration-300 ease-in-out hover:bg-blue-800 focus:outline-none"
		type="button" data-modal-toggle="create-product-modal">
		[+] Produk baru
	</button>

	<div id="create-product-modal" tabindex="-1"
		class="h-modal fixed top-0 right-0 left-0 z-50 hidden overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
		<div class="relative h-full w-full max-w-md p-4 md:h-auto">
			<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
				<button type="button"
					class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
					data-modal-toggle="create-product-modal">
					<svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd"
							d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
							clip-rule="evenodd"></path>
					</svg>
					<span class="sr-only">Close modal</span>
				</button>
				<div class="py-6 px-6 lg:px-8">
					<h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Tambahkan Produk Baru</h3>
					<form class="space-y-6" action="{{ route('dashboard.store') }}" enctype="multipart/form-data" method="POST">
						@csrf
						<div>
							<label for="nama" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Nama Produk</label>
							<input type="text" id="nama"
								class="@error('nama') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
								name="nama" value="{{ old('nama') }}">
							@error('nama')
								<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
								</p>
							@enderror
						</div>
						<div>
							<label for="harga" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Harga Produk</label>
							<input type="text" id="harga"
								class="@error('harga') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
								name="harga" value="{{ old('harga') }}">
							@error('harga')
								<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
								</p>
							@enderror
						</div>
						<div>
							<label for="deskripsi" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi
								Produk</label>
							<textarea type="text" id="deskripsi" rows="4"
							 class="@error('deskripsi') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
							 name="deskripsi">{{ old('deskripsi') }}</textarea>
							@error('deskripsi')
								<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
								</p>
							@enderror
						</div>
						<div>
							<label for="url_foto" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Foto Produk
							</label>
							<input type="file" id="url_foto"
								class="@error('url_foto') border-red-500 ring-red-500 @enderror block w-full rounded-lg border text-sm"
								name="url_foto" value="{{ old('url_foto') }}">
							@error('url_foto')
								<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
								</p>
							@enderror
						</div>
						<div>
							<button type="submit"
								class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="relative mt-10 overflow-x-auto">
		<table class="w-full rounded-lg bg-red-200 text-left text-sm text-gray-500 dark:text-gray-400">
			<thead class="sm:text-md text-secondary text-center md:text-lg">
				<tr>
					<th scope="col" class="py-3 px-6">
						#
					</th>
					<th scope="col" class="py-3 px-6">
						Gambar
					</th>
					<th scope="col" class="py-3 px-6">
						Nama Produk
					</th>
					<th scope="col" class="py-3 px-6">
						Harga
					</th>
					<th scope="col" class="py-3 px-6">
						Deskripsi
					</th>
					<th scope="col" class="py-3 px-6">
						Dibuat Pada
					</th>
					<th scope="col" class="py-3 px-6">
						Aksi
					</th>
				</tr>
			</thead>
			<tbody class="bg-red-100 text-center">
				@forelse ($produk as $key => $produk)
					<tr class="text-secondary text-md bg-white py-4 px-6 font-medium">
						<th scope="row">
							{{ $key + 1 }}
						</th>
						<td class="py-4 px-6">
							<img src="{{ $produk->url_foto }}" class="w-[200px] rounded-md">
						</td>
						<td class="py-4 px-6">
							{{ $produk->nama }}
						</td>
						<td class="py-4 px-6">
							{{ $produk->harga }}
						</td>
						<td class="py-4 px-6">
							{{ $produk->deskripsi }}
						</td>
						<td class="py-4 px-6">
							{{ $produk->created_at }}
						</td>
						<td>
							<button
								class=" block rounded bg-red-500 px-4 py-2 text-center text-sm font-medium text-white duration-300 ease-in-out hover:bg-[#B91C1C] focus:outline-none"
								type="button" data-modal-toggle="delete-modal{{ $produk->id }}">
								Hapus
							</button>
							<div id="delete-modal{{ $produk->id }}" tabindex="-1"
								class="h-modal fixed top-0 right-0 left-0 z-50 hidden overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
								<div class="relative h-full w-full max-w-md p-4 md:h-auto">
									<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
										<button type="button"
											class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
											data-modal-toggle="delete-modal{{ $produk->id }}">
											<svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
												xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd"
													d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
													clip-rule="evenodd"></path>
											</svg>
											<span class="sr-only">Close modal</span>
										</button>
										<div class="p-6 text-center">
											<svg aria-hidden="true" class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200" fill="none"
												stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
											</svg>
											<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda Yakin?</h3>
											<div class="flex flex-wrap justify-center">
												<form action="{{ route('dashboard.destroy', $produk->id) }}" method="post">
													@csrf
													@method('delete')
													<button type="submit"
														class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none dark:focus:ring-red-800">
														Yakin
													</button>
												</form>
												<button data-modal-toggle="delete-modal{{ $produk->id }}" type="button"
													class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none">Batal</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<th colspan="7" scope="row" class="text-secondary whitespace-nowrap py-4 px-6 font-medium">
							<h2 class="text-center text-2xl font-bold">Tidak ada produk terbaru</h2>
						</th>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
@endsection
