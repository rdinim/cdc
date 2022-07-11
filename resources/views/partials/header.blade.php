<nav class="fixed z-50 w-full bg-white top-0 flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg shadow-lg">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-gray-800 text-2xl" href="#">PSCC</a>
            <button id="menu-btn" class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-10 w-10"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg></button>
        </div>
        <div class="lg:flex flex-grow items-center hidden" id="menu">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">

                <li>
                    <a href="{{ route('homepage') }}" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                        <i class="h-4 w-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </i><span class="ml-1">Home</span>
                    </a>
                </li>

                <li>
                    <div x-data="{ show: false }"  @mouseover.away="show = false">
                        <a href="#" @mouseover="show = ! show" type="button" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                           <i class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                </svg>
                            </i> <span class="ml-2">Tentang</span>
                        </a>
                        <div x-show="show" class="absolute bg-white rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem">
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Profil</a>
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Sambutan</a>
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Visi & Misi</a>
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Struktur Organisasi</a>
                        </div>
                    </div>
                </li>

                <li>
                    <div x-data="{ show: false }"  @mouseover.away="show = false">
                        <a href="#" @mouseover="show = ! show" type="button" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                           <i class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M18.72,14.76C19.07,13.91 19.26,13 19.26,12C19.26,11.28 19.15,10.59 18.96,9.95C18.31,10.1 17.63,10.18 16.92,10.18C13.86,10.18 11.15,8.67 9.5,6.34C8.61,8.5 6.91,10.26 4.77,11.22C4.73,11.47 4.73,11.74 4.73,12A7.27,7.27 0 0,0 12,19.27C13.05,19.27 14.06,19.04 14.97,18.63C15.54,19.72 15.8,20.26 15.78,20.26C14.14,20.81 12.87,21.08 12,21.08C9.58,21.08 7.27,20.13 5.57,18.42C4.53,17.38 3.76,16.11 3.33,14.73H2V10.18H3.09C3.93,6.04 7.6,2.92 12,2.92C14.4,2.92 16.71,3.87 18.42,5.58C19.69,6.84 20.54,8.45 20.89,10.18H22V14.67H22V14.69L22,14.73H21.94L18.38,18L13.08,17.4V15.73H17.91L18.72,14.76M9.27,11.77C9.57,11.77 9.86,11.89 10.07,12.11C10.28,12.32 10.4,12.61 10.4,12.91C10.4,13.21 10.28,13.5 10.07,13.71C9.86,13.92 9.57,14.04 9.27,14.04C8.64,14.04 8.13,13.54 8.13,12.91C8.13,12.28 8.64,11.77 9.27,11.77M14.72,11.77C15.35,11.77 15.85,12.28 15.85,12.91C15.85,13.54 15.35,14.04 14.72,14.04C14.09,14.04 13.58,13.54 13.58,12.91A1.14,1.14 0 0,1 14.72,11.77Z" />
                                </svg>
                            </i> <span class="ml-2">Layanan</span>
                        </a>
                        <div x-show="show" class="absolute bg-white rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem">
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('info-lowongan') }}">Info Lowongan</a>
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('bimbingan-karir') }}">Bimbingan Karir</a>
                        </div>
                    </div>
                </li>

                <li>
                    <a class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2" href="{{ route('form-kuesioner') }}">
                        <i class="h-4 w-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z" />
                            </svg>
                        </i><span class="ml-2">Tracer Study</span>
                    </a>
                </li>

                <li>
                    <a class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2" href="{{ route('maintenance-mode') }}">
                        <i class="h-4 w-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M21 3H3C2.4 3 2 3.4 2 4V10C2 10.6 2.4 11 3 11H21C21.6 11 22 10.6 22 10V4C22 3.4 21.6 3 21 3M21 13H3C2.4 13 2 13.4 2 14V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20V14C22 13.4 21.6 13 21 13Z" />
                            </svg>
                        </i><span class="ml-2">Agenda</span>
                    </a>
                </li>

                <li>
                    <div x-data="{ show: false }"  @mouseover.away="show = false">
                        <a href="#" @mouseover="show = ! show" type="button" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                           <i class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7,15L11.5,9L15,13.5L17.5,10.5L21,15M22,4H14L12,2H6A2,2 0 0,0 4,4V16A2,2 0 0,0 6,18H22A2,2 0 0,0 24,16V6A2,2 0 0,0 22,4M2,6H0V11H0V20A2,2 0 0,0 2,22H20V20H2V6Z" />
                                </svg>
                            </i> <span class="ml-2">Media</span>
                        </a>
                        <div x-show="show" class="absolute bg-white rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem">
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Berita</a>
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Galeri</a>
                        </div>
                    </div>
                </li>

                <li>
                    <div x-data="{ show: false }"  @mouseover.away="show = false">
                        <a href="#" @mouseover="show = ! show" type="button" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                           <i class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z" />
                                </svg>
                            </i> <span class="ml-2">PTW</span>
                        </a>
                        <div x-show="show" class="absolute bg-white rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem">
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Pengumuman</a>
                            <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="{{ route('maintenance-mode') }}">Panduan</a>
                        </div>
                    </div>
                </li>
                
                <li>
                    @if (auth()->user())
                        {{-- if user logged in --}}
                        <div x-data="{ show: false }"  @mouseover.away="show = false">
                            <a href="#" @mouseover="show = ! show" type="button" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                               <i class="h-4 w-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M7,15L11.5,9L15,13.5L17.5,10.5L21,15M22,4H14L12,2H6A2,2 0 0,0 4,4V16A2,2 0 0,0 6,18H22A2,2 0 0,0 24,16V6A2,2 0 0,0 22,4M2,6H0V11H0V20A2,2 0 0,0 2,22H20V20H2V6Z" />
                                    </svg>
                                </i> <span class="ml-2">Hi, {{ auth()->user()->nm_pengguna }}</span>
                            </a>
                            <div x-show="show" class="absolute bg-white rounded-md shadow-xl z-10 shadow-md" style="min-width:10rem">
                                <a class="block px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" href="#">Dashboard</a>
                                <form method="post" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button class="block w-full text-left px-3 py-2 text-sm capitalize text-gray-700 hover:bg-blue-300 hover:text-white" type="submit">Logout</button>
                                </form>    
                            </div>
                        </div>
                    @else
                        {{-- if user not logged in --}}
                        <a href="{{ route('login') }}" class="px-3 py-4 flex items-center text-xs uppercase font-bold text-gray-800 hover:text-gray-600 lg:py-2">
                            <i class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                </svg>
                            </i><span class="ml-1">Login</span>
                        </a>   
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>