@extends('layouts.app')

	{{-- success message --}}
	{{-- @if ($message = Session::get('success'))
		<div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			  <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
			</svg>
			{{ $message }}
		</div>
	@endif --}}
	@if ($message = Session::get('success'))
		<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
			<span class="text-xl inline-block mr-5 align-middle">
			<i class="fas fa-bell"></i>
			</span>
			<span class="inline-block align-middle mr-8">
			<b class="capitalize">Sukses!</b> {{ $message }}
			</span>
			<button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
			<span>×</span>
			</button>
		</div>
	@endif
	{{-- end success message --}}

@section('content')
	
	{{-- success message --}}
	@if ($message = Session::get('success'))
		<div class="bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			  <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
			</svg>
			{{ $message }}
		</div>
	@endif
	{{-- end success message --}}

    <div class="gradient-overlay bg-no-repeat bg-cover mt-16 flex items-center justify-between">	
        <div class="container mt-40 mx-auto flex flex-col justify-between sm:mt-0 sm:flex-row">
            <section class="px-4 mx-0 flex items-center w-full sm:w-1/2">
                <div>
					@if (auth()->user())
						<h1 class="text-5xl text-white text-left">Selamat Datang</h1><br>
						<h2 class="text-4xl text-white text-left">di Portal Career Development Center<br>Poltekbang Surabaya</h2><br>
					@else
						<h1 class="text-4xl text-white text-left">Poltekbang Surabaya<br>Career Development Center</h1><br>
					@endif
                    <p class="text-gray-200 italic text-xl">Portal informasi seputar pengembangan karir bagi Alumni Poltekbang Surabaya</p>
                    <a href="{{ route('info-lowongan') }}">
						<button class="mt-10 bg-gray-100 hover:bg-blue-400 hover:text-gray-100 hover:bg-blue-100 border-2 text-blue-800 font-bold py-3 px-4 rounded-md w-full sm:w-auto">
							Info Lowongan
						</button>
					</a>
                </div>
            </section>
                
            <section class="p-5 flex w-full lg:p-0 sm:w-1/2">
				<img class="w-full rounded" src="{{ asset('storage/images/landing_page/alumni2.png') }}" alt="Sunset in the mountains">
            </section>
        </div>
    </div>
	<div class="container mx-auto px-4 py-7">
		<section class="text-center mb-5">
			<h2 class="text-4xl mb-4 font-semibold">Sambutan</h2>
		</section>
		<section class="container mx-auto mt-40 flex flex-col items-center justify-between bg-gray-100 sm:mt-10 sm:flex-row">
			<div class="pt-5 px-10 sm:pr-20 sm:w-1/2 w-full">	
				<p class="mt-4 text-gray-700 text-justify">
					Assalammu’alaikum wr. wb., salam sejahtera untuk kita semua.
				</p>
				<p class="mt-4 text-gray-700 mb-10 text-justify">
					Website Career Development Center Poltekbang Surabaya dirancang untuk pengembangan karir alumni dan juga lebih memudahkan untuk kami dalam melakukan pendataan Alumni dan juga agar data terdokumentasi lebih baik serta bisa diperoleh data yg cepat dan akurat. Untuk itu kami harapkan seluruh Alumni bisa memanfaatkan dengan sebaik baiknya agar tetap terhubung dengan Poltekbang Surabaya. Kami ucapkan terima kasih kepada Tim Pengembang Website ini.<br> Wassalamu’alaikum wr. wb. 
				</p>
				<h2 class="text-1xl font-bold">Direktur Politeknik Penerbangan Surabaya</h2>
				<a href="#" class="text-sm bg-blue-400 uppercase border lg:border-none hover:bg-blue-800 text-white font-bold w-full p-3 rounded no-underline text-center mt-16 mb-10 block sm:inline-block sm:w-auto">Baca Selengkapnya</a>
			</div>
			<div class="mt-10 w-3/4 sm:w-1/2 sm:mt-0 p-10">
				<img src="{{ asset('storage/images/landing_page/sambutan_direktur_2.png') }}" 
					alt="rotated" 
					style="transform:scale(1) perspective(1040px) rotateY(-11deg) rotateX(2deg) rotate(2deg)" 
					class="rounded-lg shadow-xl max-w-full" />
			</div>
		</section>
	</div>
	
    <!-- berita terkini -->
	<div class="container mx-auto px-4 py-7">
		<section class="text-center mb-5">
			<h2 class="text-4xl mb-4 font-semibold">Berita Terkini</h2>
		</section>
		
		<div class="flex flex-col justify-between sm:flex-row">
			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto">
				<img class="w-full h-64" src="{{ asset('storage/images/landing_page/berita1.jpeg') }}" alt="How to stay competetive on the market">
				<div class="px-6 py-2 ">
					<div class="flex space-x-16">
						<p class="text-xs mb-5 text-gray inline-block px-2 py-1">dipost oleh : Administrator</p>
						<p class="text-xs mb-5 text-gray inline-block px-2 py-1">28 Oktober 2021</p>
					</div>
					<div class="font-bold text-xl mb-2">Seminar Nasional Inovasi Teknologi Penerbangan</div>
					<p class="text-gray-700 text-base">Pada tanggal 27 Oktober 2021 Poltekbang Surabaya telah menggelar kegiatan Seminar Nasional...</p>
					<a href="#" class="text-sm bg-blue-200 uppercase block border lg:border-none hover:bg-blue-800 text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center mt-16">Baca Selengkapnya</a>
				</div>
			</div>
			<!--/ card -->

			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto">
				<img class="w-full h-64" src="{{ asset('storage/images/landing_page/berita2.jpeg') }}" alt="How to stay competetive on the market">
				<div class="px-6 py-2 mb-5">
					<div class="flex space-x-16">
						<p class="text-xs mb-5 text-gray inline-block px-2 py-1">dipost oleh : Administrator</p>
						<p class="text-xs mb-5 text-gray inline-block px-2 py-1">2 Agustus 2021</p>
					</div>
					<div class="font-bold text-xl mb-2">Workshop Pengembangan Karir Lulusan Poltekbang Surabaya</div>
					<p class="text-gray-700 text-base">Poltekbang Surabaya mengadakan Workshop Pengembangan Karir selama 3 hari yang dilaksanakan secara...</p>
					<a href="#" class="text-sm bg-blue-200 uppercase block border lg:border-none hover:bg-blue-800 text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center mt-16">Baca Selengkapnya</a>
				</div>
			</div>
			<!--/ card -->

			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto">
				<img class="w-full h-64" src="{{ asset('storage/images/landing_page/berita3.jpeg') }}" alt="How to stay competetive on the market">
				<div class="px-6 py-2 ">
					<div class="flex space-x-16">
						<p class="text-xs mb-5 text-gray inline-block px-2 py-1">dipost oleh : Administrator</p>
						<p class="text-xs mb-5 text-gray inline-block px-2 py-1">20 Agustus 2021</p>
					</div>
					<div class="font-bold text-xl mb-2">Bimbingan dan Konseling 2021 Poltekbang Surabaya</div>
					<p class="text-gray-700 text-base">Poltekbang Surabaya menggelar kegiatan bimbingan dan konseling yang ditujukan khusus untuk alumni Poltekbang...</p>
					<a href="#" class="text-sm bg-blue-200 uppercase block border lg:border-none hover:bg-blue-800 text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center mt-16">Baca Selengkapnya</a>
				</div>
			</div>
			<!--/ card -->
		</div>
	</div>
	<!-- /berita terkini -->

	<!-- galeri -->
	<div class="container mx-auto px-4 py-10">
		<section class="text-center mb-5">
			<h2 class="text-4xl mb-4 font-semibold">Galeri</h2>
		</section>
		
		<div class="flex flex-col justify-between sm:flex-row">
			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto transform transition duration-500 hover:scale-110">
				<a href="#" class=" block border lg:border-none text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center">
					<img class="w-full rounded h-60" src="{{ asset('storage/images/landing_page/galeri1.jpeg') }}" alt="How to stay competetive on the market">
				</a>
			</div>
			<!--/ card -->

			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto transform transition duration-500 hover:scale-110">
				<a href="#" class=" block border lg:border-none text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center">
					<img class="w-full rounded h-60" src="{{ asset('storage/images/landing_page/galeri2.jpeg') }}" alt="How to stay competetive on the market">
				</a>
			</div>
			<!--/ card -->

			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto transform transition duration-500 hover:scale-110">
				<a href="#" class=" block border lg:border-none text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center">
					<img class="w-full rounded h-60" src="{{ asset('storage/images/landing_page/galeri3.jpeg') }}" alt="How to stay competetive on the market">
				</a>
			</div>
			<!--/ card -->
		</div>

		<div class="flex flex-col justify-between sm:flex-row">
			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto transform transition duration-500 hover:scale-110">
				<a href="#" class=" block border lg:border-none text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center">
					<img class="w-full rounded h-60" src="{{ asset('storage/images/landing_page/galeri4.jpeg') }}" alt="How to stay competetive on the market">
				</a>
			</div>
			<!--/ card -->

			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto transform transition duration-500 hover:scale-110">
				<a href="#" class=" block border lg:border-none text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center">
					<img class="w-full rounded h-60" src="{{ asset('storage/images/landing_page/galeri5.jpeg') }}" alt="How to stay competetive on the market">
				</a>
			</div>
			<!--/ card -->

			<!-- card -->
			<div class="max-w-sm rounded overflow-hidden shadow-md bg-white mt-10 mx-auto transform transition duration-500 hover:scale-110">
				<a href="#" class=" block border lg:border-none text-white font-bold w-full p-3 rounded no-underline mx-auto max-w-sm text-center">
					<img class="w-full rounded h-60" src="{{ asset('storage/images/landing_page/galeri6.jpeg') }}" alt="How to stay competetive on the market">
				</a>
			</div>
			<!--/ card -->
		</div>
	</div>
	<!-- /galeri -->

@endsection

<script>
	function closeAlert(event){
	  let element = event.target;
	  while(element.nodeName !== "BUTTON"){
		element = element.parentNode;
	  }
	  element.parentNode.parentNode.removeChild(element.parentNode);
	}
</script>
