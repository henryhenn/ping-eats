@extends('layouts.main')

@section('title')
	Profil: {{ auth()->user()->nama }}
@endsection

@section('content')
	<x-page-heading :title="'Profil User'" />

	<div class="mt-14 flex flex-wrap justify-center">
		<div class="rounded-lg bg-red-50 p-8 shadow-lg sm:w-full md:w-1/2">
			<img src="{{ auth()->user()->profpict }}" class="mx-auto block rounded-lg" width="150px">
			<h1 class="text-secondary mt-6 text-3xl font-bold">{{ auth()->user()->nama_dagang }}</h1>

			<div class="sm:text-md md:text-lg">
				<p class="text-secondary mt-6">Nama Lengkap: <span class="font-semibold">{{ auth()->user()->nama }}</span></p>
				<p class="text-secondary mt-2">Lokasi: <span class="font-semibold">{{ auth()->user()->lokasi }}</span></p>
				<p class="text-secondary mt-2">Email: <span class="font-semibold">{{ auth()->user()->email }}</span></p>
				<p class="text-secondary mt-2">Telpon: <span class="font-semibold">{{ auth()->user()->no_telp }}</span></p>
			</div>
			<button
				class="text-md mt-6 block rounded bg-red-500 px-6 py-2.5 text-center font-semibold text-white duration-300 ease-in-out hover:bg-[#B91C1C] focus:outline-none"
				type="button" data-modal-toggle="update-modal">
				<i class="fa-solid fa-pen-to-square"></i> Edit
			</button>
			<div id="update-modal" tabindex="-1"
				class="h-modal fixed top-0 right-0 left-0 z-50 hidden overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
				<div class="relative h-full w-full max-w-full p-4 md:h-auto">
					<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
						<button type="button"
							class="text-md absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
							data-modal-toggle="update-modal">
							<svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
									clip-rule="evenodd"></path>
							</svg>
							<span class="sr-only">Close modal</span>
						</button>
						<div class="py-6 px-6 lg:px-8">
							<h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Edit Profil Anda </h3>
							<form action="{{ route('profil.update', auth()->id()) }}" enctype="multipart/form-data" method="POST">
								@csrf
								@method('put')
								<div class="flex gap-6">
									<div class="space-y-6 sm:w-full md:w-1/2">
										<div>
											<label for="nama" class="text-md mb-2 block font-medium text-gray-900">Nama
												Lengkap</label>
											<input type="text" id="nama"
												class="@error('nama') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
												name="nama" value="{{ old('nama', auth()->user()->nama) }}">
											@error('nama')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
										<div>
											<label for="nama_dagang" class="text-md mb-2 block font-medium text-gray-900">Nama Dagang
											</label>
											<input type="text" id="nama_dagang"
												class="@error('nama_dagang') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
												name="nama_dagang" value="{{ old('nama_dagang', auth()->user()->nama_dagang) }}">
											@error('nama_dagang')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
										<div>
											<label for="lokasi" class="text-md mb-2 block font-medium text-gray-900">Lokasi</label>
											<textarea type="text" id="lokasi" rows="4"
											 class="@error('lokasi') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
											 name="lokasi">{{ old('lokasi', auth()->user()->lokasi) }}</textarea>
											@error('lokasi')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
										<div>
											<label for="email" class="text-md mb-2 block font-medium text-gray-900">Email
											</label>
											<input type="text" id="email"
												class="@error('email') border-red-500 ring-red-500 @enderror block w-full rounded-lg border text-sm"
												name="email" value="{{ old('email', auth()->user()->email) }}">
											@error('email')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
									</div>
									<div class="space-y-6 sm:w-full md:w-1/2">
										<div>
											<label for="password" class="text-md mb-2 block font-medium text-gray-900">Password
											</label>
											<input type="password" id="password"
												class="@error('password') border-red-500 ring-red-500 @enderror block w-full rounded-lg border text-sm"
												name="password" placeholder="Jangan Isi Apabila Tidak Ingin Mengubah Password">
											@error('password')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
										<div>
											<label for="no_telp" class="text-md mb-2 block font-medium text-gray-900">No. Telpon
											</label>
											<input type="text" id="no_telp"
												class="@error('no_telp') border-red-500 ring-red-500 @enderror block w-full rounded-lg border text-sm"
												name="no_telp" value="{{ old('no_telp', auth()->user()->no_telp) }}">
											@error('no_telp')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
										<div>
											<label for="profpict" class="text-md mb-2 block font-medium text-gray-900">Foto Profil
											</label>
											<input type="file" id="profpict"
												class="@error('profpict') border-red-500 ring-red-500 @enderror block w-full rounded-lg border text-sm"
												name="profpict" value="{{ old('profpict') }}">
											@error('profpict')
												<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
												</p>
											@enderror
										</div>
									</div>
								</div>
								<button type="submit"
									class="text-md mt-6 w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center font-semibold text-white hover:bg-blue-800 focus:outline-none">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
