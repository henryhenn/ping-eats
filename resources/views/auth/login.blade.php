@extends('layouts.main')

@section('title')
	Login User
@endsection

@section('content')
	<x-page-heading :title="'Silakan Login'" />

	<div class="mt-8 flex justify-center">
		<form action="{{ route('auth.authenticate') }}" method="post" class="w-[600px]">
			@csrf
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

			<button type="submit"
				class="mt-4 rounded-lg bg-red-600 px-6 py-2.5 font-semibold text-white duration-300 ease-in-out hover:bg-red-800">Login</button>
		</form>
	</div>
@endsection
