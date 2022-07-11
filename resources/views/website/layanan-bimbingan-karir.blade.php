@extends('layouts.app')

@section('content')
    {{-- form filter --}}
    <form method="get" action="{{ route('bimbingan-karir') }}">
        <div class="container mx-auto py-32 pb-0 flex justify-items-start px-0 bg-white">
            <div class="flex items-center p-4 space-x-5 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition duration-500" style="background: rgb(27,48,97)">
                <div class="flex bg-gray-100 p-2 space-x-6 rounded-lg " >
                    <select class=" bg-gray-100 outline-none rounded px-3 py-0 outline-none rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem" name="category">
                        <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="">-- Kategori --</option>
                        @foreach ($category as $item)
                            <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="{{ $item->slug }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="py-3 px-5 text-white font-semibold rounded-lg hover:bg-blue-200 transition duration-3000 cursor-pointer focus:outline-none" style="background: rgb(123,150,212); 100%);" type="submit">
                    <span>Search</span>
                </button>
            </div>
        </div>
    </form>
    {{-- /form filter --}}

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-20 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach ($bimbingan_karir as $item)
                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                        <div class="md:w-52 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <span class="font-semibold title-font text-gray-700 text-xl">{{ optional($item->schedule)->isoFormat('DD MMMM Y') }}</span>
                        <span class="mt-1 text-gray-500 text-lg">{{ optional($item->category)->category }}</span>
                        </div>
                        <div class="md:w-52 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <img src="{{ !empty($item->flyer) ? asset('storage/'.$item->flyer) : asset('storage/images/no-image.png')  }}" 
                                    alt="rotated" 
                                    style="transform:scale(1) perspective(1040px)" 
                                    class="rounded-lg shadow-xl max-w-full" />
                        </div>
                        <div class="md:flex-grow pl-10">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $item->title }}</h2>
                        <p class="leading-relaxed">{{ substr($item->agendadesc, 0,50) }}...</p>
                        <a href="{{ route('detail-bimbingan-karir', $item->id) }}" class="text-indigo-500 inline-flex items-center mt-4">Info Selengkapnya
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                @endforeach   
            </div>
        </div>
         {{-- pagination --}}
         <div class="mt-4 mr-20 mb-20 px-20">{{ $bimbingan_karir->links() }}</div>
    </section>
@endsection