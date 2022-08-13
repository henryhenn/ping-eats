<nav class="bg-primary border-gray-200 px-2 sticky top-0 z-50 py-2 shadow-sm sm:px-4">
	<div class="container mx-auto flex flex-wrap items-center justify-between">
		@auth
			@role('Pembeli')
				<a href="{{ route('home') }}" class="flex items-center">
					<span class="self-center whitespace-nowrap text-2xl font-bold text-white">Ping Eats
					</span>
				</a>
				@elserole('Pedagang Kaki Lima')
				<a href="{{ route('dashboard.index') }}" class="flex items-center">
					<span class="self-center whitespace-nowrap text-2xl font-bold text-white">Ping Eats | Dashboard
					</span>
				</a>
			@endrole
		@else
			<a href="{{ route('home') }}" class="flex items-center">
				<span class="self-center whitespace-nowrap text-2xl font-bold text-white">Ping Eats
				</span>
			</a>
		@endauth
		<button data-collapse-toggle="navbar-default" type="button"
			class="ml-3 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
			aria-controls="navbar-default" aria-expanded="false">
			<span class="sr-only">Open main menu</span>
			<svg class="h-6 w-6 fill-current" aria-hidden="true" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd"
					d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
					clip-rule="evenodd"></path>
			</svg>
		</button>
		<div class="hidden w-full md:block md:w-auto" id="navbar-default">
			<ul
				class="md:text-md mt-4 flex flex-col rounded-lg border border-gray-100 p-4 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:font-medium">
				@auth
					@role('Pembeli')
						<li>
							<a href="{{ route('home') }}"
								class="{{ request()->routeIs('home') || request()->routeIs('detail') ? 'text-[#FBBF24] drop-shadow-xl' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:bg-transparent md:p-0 md:hover:text-[#FBBF24] md:hover:drop-shadow-xl"
								aria-current="page"><i class="fa-solid fa-bag-shopping"></i> Produk</a>
						</li>
						<li>
							<a href="{{ route('lokasi.index') }}"
								class="{{ request()->routeIs('lokasi.*') ? 'text-[#FBBF24] drop-shadow-xl' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:bg-transparent md:p-0 md:hover:text-[#FBBF24] md:hover:drop-shadow-xl"><i
									class="fa-solid fa-location-dot"></i> Lokasi</a>
						</li>
						<li>
							<a href="{{ route('transaksi-pembeli.index') }}"
								class="{{ request()->routeIs('transaksi-pembeli.*') ? 'text-[#FBBF24] drop-shadow-xl' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:bg-transparent md:p-0 md:hover:text-[#FBBF24] md:hover:drop-shadow-xl"
								aria-current="page"><i class="fa-solid fa-dollar-sign"></i> Transaksi</a>
						</li>
					@endrole
					@role('Pedagang Kaki Lima')
						<li>
							<a href="{{ route('dashboard.index') }}"
								class="{{ request()->routeIs('dashboard.*') ? 'text-[#FBBF24] drop-shadow-xl' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:bg-transparent md:p-0 md:hover:text-[#FBBF24] md:hover:drop-shadow-xl"
								aria-current="page"><i class="fa-solid fa-bag-shopping"></i> Produk</a>
						</li>
						<li>
							<a href="{{ route('profil.index') }}"
								class="{{ request()->routeIs('profil.*') ? 'text-[#FBBF24] drop-shadow-xl' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:border-0 md:p-0 md:hover:text-[#FBBF24] md:hover:drop-shadow-xl"><i
									class="fa-solid fa-user-circle"></i> Profile</a>
						</li>
						<li>
							<a href="{{ route('transaksi.index') }}"
								class="{{ request()->routeIs('transaksi.*') ? 'text-[#FBBF24] drop-shadow-xl' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:border-0 md:p-0 md:hover:text-[#FBBF24] md:hover:drop-shadow-xl"
								aria-current="page"><i class="fa-solid fa-dollar-sign"></i> Transaksi</a>
						</li>
					@endrole
					<li>
						<a href="#"
							class="block rounded py-2 pr-4 pl-3 text-base text-white hover:bg-gray-100 md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-[#FBBF24]"
							data-modal-toggle="popup-modal"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>

						{{-- Logout Modal --}}
						<div id="popup-modal" tabindex="-1"
							class="h-modal fixed top-0 right-0 left-0 z-50 hidden overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
							<div class="relative h-full w-full max-w-md p-4 md:h-auto">
								<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
									<button type="button"
										class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
										data-modal-toggle="popup-modal">
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
										<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda Yakin Ingin Logout?</h3>
										<div class="flex flex-wrap justify-center">
											<form action="{{ route('auth.logout') }}" method="post">
												@csrf
												<button data-modal-toggle="popup-modal" type="submit"
													class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
													Logout
												</button>
											</form>
											<button data-modal-toggle="popup-modal" type="button"
												class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Batal</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				@else
					<li>
						<a href="{{ route('home') }}"
							class="{{ request()->routeIs('home') || request()->routeIs('detail') ? 'text-[#FBBF24]' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:bg-transparent md:p-0 md:hover:text-[#FBBF24]"
							aria-current="page"><i class="fa-solid fa-bag-shopping"></i> Produk</a>
					</li>
					<li>
						<a href="{{ route('lokasi.index') }}"
							class="{{ request()->routeIs('lokasi.*') ? 'text-[#FBBF24]' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base md:bg-transparent md:p-0 md:hover:text-[#FBBF24]"
							aria-current="page"><i class="fa-solid fa-location-dot"></i> Lokasi</a>
					</li>
					<li>
						<a href="{{ route('auth.login') }}"
							class="{{ request()->routeIs('auth.login') ? 'text-[#FBBF24]' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base hover:bg-gray-100 md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-[#FBBF24]"><i
								class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
					</li>
					<li>
						<a href="{{ route('auth.register') }}"
							class="{{ request()->routeIs('auth.register') ? 'text-[#FBBF24]' : 'text-white' }} block rounded py-2 pr-4 pl-3 text-base hover:bg-gray-100 md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-[#FBBF24]"><i
								class="fa-solid fa-user-pen"></i> Daftar</a>
					</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
