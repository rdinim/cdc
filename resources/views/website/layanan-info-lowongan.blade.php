@extends('layouts.app')

@section('content')

    {{-- form filter --}}
    <form method="get" action="{{ route('info-lowongan') }}">
        <div class="container mx-auto py-24 pb-0 flex justify-center items-center px-20 bg-white">
            <div class="flex items-center p-6 space-x-5 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition duration-500" style="background: rgb(27,48,97)">
                <div class="flex bg-gray-100 p-4 space-x-3 rounded-lg " >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input class="bg-gray-100 outline-none" name="title" type="text" placeholder="Keyword..." />
                </div>

                <div class="flex bg-gray-100 p-4 space-x-6 rounded-lg " >
                    <select class=" bg-gray-100 outline-none rounded px-3 py-0 outline-none rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem" name="company">
                        <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="">-- Nama Perusahaan --</option>
                        @foreach ($company as $item)
                            <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="{{ $item->slug }}">{{ $item->companyname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex bg-gray-100 p-4 space-x-6 rounded-lg " >
                    <select class=" bg-gray-100 outline-none rounded px-3 py-0 outline-none rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem" name="idjoblocation" id="idjoblocation" aria-placeholder="--Lokasi--">
                        <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="">-- Lokasi --</option>
                        @foreach ($location as $item)
                            <optgroup label="{{ $item->nm_wil }}">
                                @php
                                    // $idjoblocation = !empty(request('idjoblocation')) ? request('idjoblocation') : null;
                                    $idjoblocation = $item->cities;
                                @endphp
                                @foreach ($idjoblocation as $city)
                                    <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="{{ $city->id_wil }}">{{ $city->nm_wil }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    </div>

                    <div class="flex bg-gray-100 p-4 space-x-6 rounded-lg " >
                        <select class=" bg-gray-100 outline-none rounded px-3 py-0 outline-none rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem" name="jobposition">
                            <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="">-- Posisi --</option>
                            @foreach ($jobposition as $item)
                                <option class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" value="{{ $item->slug }}">{{ $item->position }}</option>
                            @endforeach
                        </select>
                    </div>

                <button class="py-3 px-5 text-white font-semibold rounded-lg hover:bg-blue-200 transition duration-3000 cursor-pointer" style="background: rgb(123,150,212); 100%);" type="submit">
                    <span>Search</span>
                </button>
            </div>
        </div>
    </form>
    {{-- form filter --}}
    <div class="container my-12 mx-auto px-4 md:px-12 py-24">

        {{-- content --}}
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            
            @foreach ($info_lowongan as $item)
                <!-- Column -->
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 items-stretch">

                    <!-- Article -->
                    <article class="flex flex-wrap justify-center content-between overflow-hidden rounded-lg shadow-lg h-full">
                        <div>
                            <section class="grid place-items-center hero container max-w-screen-lg mx-auto pb-3 py-5 object-contain px-10">
                                <img class="my-auto mx-auto h-24" src="{{ !empty($item->company->logo) ? asset('storage/'.$item->company->logo) : asset('storage/images/no-image.png')  }}" alt="screenshot" >
                            </section>
                        </div>
                        <div>
                            <header class="leading-tight p-0 md:p-2 text-center">
                                <div>
                                    <a class="no-underline hover:underline text-black" href="#">
                                        <h4 class=" text-2xl">{{ $item->title }}</h4>
                                    </a>
                                </div>
                                <p class=" text-lg pt-0">{{ optional($item->company)->companyname }}</p>
                            </header>
                            <div class="p-8">
                                <table class="text-sm">
                                    <tbody><tr>
                                        <td class="align-center w-32">Posisi</td>
                                        <td style="padding-left:5px; padding-right:5px;">:</td>
                                        <td>{{ optional($item->jobposition)->position }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-center w-32">Tipe Lowongan</td>
                                        <td style="padding-left:5px; padding-right:5px; vertical-align:center;">:</td>
                                        <td>{{ optional($item->servicetype)->servicetype }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-center w-32">Lokasi</td>
                                        <td style="padding-left:5px; padding-right:5px; vertical-align:center;">:</td>
                                        <td>{{ optional($item->location)->nm_wil }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-center w-32">Tanggal Buka</td>
                                        <td style="padding-left:5px; padding-right:5px;">:</td>
                                        <td>{{ optional($item->openingdate)->isoFormat('D MMMM Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-center w-32">Tanggal Tutup</td>
                                        <td style="padding-left:5px; padding-right:5px;">:</td>
                                        <td>{{ optional($item->closingdate)->isoFormat('D MMMM Y') }}</td>
                                    </tr>
                                </tbody></table>
                            </div>

                            <footer class="flex items-center justify-between leading-none p-2 md:p-4 ">
                                <a class="flex items-center no-underline hover:text-blue-300 text-blue-900 mb-5" href="#">
                                    <i class="fas fa-info-circle"></i>
                                    <p class="ml-2 text-sm font-bold">
                                        Info Selengkapnya >
                                    </p>
                                </a>
                            </footer>
                        </div>

                    </article>
                    <!-- END Article -->

                </div>
                <!-- END Column -->
            @endforeach
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 items-stretch">

                <!-- Article -->
                <article class="flex flex-wrap justify-center content-between overflow-hidden rounded-lg shadow-lg h-full">
                    <div>
                        <section class="grid place-items-center hero container max-w-screen-lg mx-auto pb-3 py-5 object-contain px-10">
                            <img class="my-auto mx-auto h-24" src="{{ asset('storage/images/BUMN.png')  }}" alt="screenshot" >
                        </section>
                    </div>
                    <div>
                        <header class="leading-tight p-0 md:p-2 text-center">
                            <div>
                                <a class="no-underline hover:underline text-black" href="#">
                                    <h4 class=" text-2xl">Lowongan Kerja BUMN 2022</h4>
                                </a>
                            </div>
                            <p class=" text-lg pt-0">Badan Usaha Milik Negara</p>
                        </header>
                        <div class="p-8">
                            <table class="text-sm">
                                <tbody><tr>
                                    <td class="align-center w-32">Posisi</td>
                                    <td style="padding-left:5px; padding-right:5px;">:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td class="align-center w-32">Tipe Lowongan</td>
                                    <td style="padding-left:5px; padding-right:5px; vertical-align:center;">:</td>
                                    <td>Lowongan kerja</td>
                                </tr>
                                <tr>
                                    <td class="align-center w-32">Lokasi</td>
                                    <td style="padding-left:5px; padding-right:5px; vertical-align:center;">:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td class="align-center w-32">Tanggal Buka</td>
                                    <td style="padding-left:5px; padding-right:5px;">:</td>
                                    <td>14 April 2022</td>
                                </tr>
                                <tr>
                                    <td class="align-center w-32">Tanggal Tutup</td>
                                    <td style="padding-left:5px; padding-right:5px;">:</td>
                                    <td>25 April 2022</td>
                                </tr>
                            </tbody></table>
                        </div>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4 ">
                            <a class="flex items-center no-underline hover:text-blue-300 text-blue-900 mb-5" href="{{ route('detail-info-lowongan') }}">
                                <i class="fas fa-info-circle"></i>
                                <p class="ml-2 text-sm font-bold">
                                    Info Selengkapnya >
                                </p>
                            </a>
                        </footer>
                    </div>

                </article>
                <!-- END Article -->

            </div>
            <!-- END Column -->

        </div>
        {{-- pagination --}}
        <div class="mt-4">{{ $info_lowongan->links() }}</div>
    </div>
@endsection