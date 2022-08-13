@extends('layouts.main')

@section('title')
	Registrasi Akun
@endsection

@section('content')
	<x-page-heading :title="'Registrasi Akun Anda di Sini'" />

	<div class="mt-8 flex justify-center">
		<form action="{{ route('auth.store') }}" method="post" class="w-[600px]" enctype="multipart/form-data">
			@csrf
			<div class="mb-6">
				<label for="username-success" class="text-secondary mb-2 block text-sm font-medium">Nama
					Lengkap</label>
				<input autofocus type="text" id="username-success"
					class="@error('nama') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
					name="nama" value="{{ old('nama') }}">
				@error('nama')
					<p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="username-error" class="text-secondary mb-2 block text-sm font-medium">Alamat</label>
				<textarea id="username-error"
				 class="@error('lokasi') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
				 name="lokasi">{{ old('lokasi') }}</textarea>
				@error('lokasi')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>
			<div class="mb-6">
				<label for="username-error" class="text-secondary mb-2 block text-sm font-medium">Email</label>
				<input type="email" id="username-error"
					class="@error('email') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
					name="email" value="{{ old('email') }}">
				@error('email')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>
			<div class="mb-6">
				<label for="username-error" class="text-secondary mb-2 block text-sm font-medium">Password</label>
				<input type="password" id="username-error"
					class="@error('password') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
					name="password" value="{{ old('password') }}">
				@error('password')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>
			<div class="mb-6">
				<label for="username-error" class="text-secondary mb-2 block text-sm font-medium">No. Telpon</label>
				<input type="text" id="username-error"
					class="@error('no_telp') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
					name="no_telp" value="{{ old('no_telp') }}">
				@error('no_telp')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>
			<div class="mb-6">
				<label for="countries" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Registrasi
					Sebagai:</label>
				<select id="roles" onchange="toggleNamaPedagang()"
					class="@error('role') border-red-500 ring-red-500 @enderror block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
					name="role">
					<option selected="">Pilih Opsi</option>
					@forelse ($roles as $role)
						<option value="{{ $role->name }}">{{ $role->name }}</option>
					@empty
						<option value="">Tidak ada data tersedia</option>
					@endforelse
				</select>
			</div>
			<div class="mb-6 hidden" id="nama-dagang">
				<label for="nama_dagang" class="text-secondary mb-2 block text-sm font-medium">Nama Dagang</label>
				<input type="text" id="nama_dagang"
					class="@error('nama_dagang') border-red-500 ring-red-500 @enderror block w-full rounded-lg border p-2.5 text-sm"
					name="nama_dagang" value="{{ old('nama_dagang') }}">
				@error('nama_dagang')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>
			<div class="mb-6">
				<label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Foto Profil</label>
				<input
					class="@error('profpict') border-red-500 ring-red-500 @enderror block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none"
					id="file_input" type="file" name="profpict">
				@error('profpict')
					<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
					</p>
				@enderror
			</div>

			<button type="submit"
				class="mt-4 rounded-lg bg-red-600 px-6 py-2.5 font-semibold text-white duration-300 ease-in-out hover:bg-red-800">
                Submit
            </button>
		</form>
	</div>
@endsection

@push('script')
	<script>
	 function toggleNamaPedagang() {
	  let roles = document.getElementById("roles").value;
	  let nama_dagang = document.getElementById("nama-dagang");

	  if (roles == 'Pedagang Kaki Lima') {
	   nama_dagang.classList.remove('hidden');
	  } else if (roles == 'Pembeli' || '') {
	   nama_dagang.classList.add('hidden');
	  }
	 }
	</script>
@endpush
