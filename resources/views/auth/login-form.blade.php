<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <title>Login</title>
</head>
<body>
    <div class="relative min-h-screen flex ">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-blue-400" style="background: rgb(27,48,97)">
          <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden text-black bg-no-repeat bg-cover relative">
            <div class="absolute from-indigo-600 bg-white inset-0 z-0"></div>
            <div class="w-full  max-w-md z-10">
              <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6" style="color: rgb(27,48,97)">Selamat Datang Airman Poltekbang Surabaya!</div>
              <div class="">
                  <img src="{{ asset('storage/images/login/login.png') }}" alt="">
              </div>
              {{-- <div class="sm:text-sm xl:text-md text-gray-800 font-normal"> What is Lorem Ipsum Lorem Ipsum is simply dummy
                text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever
                since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it
                has?</div> --}}
            </div>

          </div>
          <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none" style="background: rgb(27,48,97)">
            <div class="max-w-md w-full space-y-8">
              <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-white">
                  Login
                </h2>
                <p class="mt-2 text-sm text-gray-200">Gunakan akun SIAKAD Anda untuk login</p>

                {{-- validation error alert --}}
                @if ($errors->any())
                    <div class="mt-8 bg-gray-200 overflow-hidden shadow sm:rounded-md">
                        <ul style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li class="">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              </div>
    
              <form method="POST" class="mt-8 space-y-6" action="{{ route('login') }}" >

                @csrf

                <input type="hidden" name="remember" value="true">
                <div class="relative">
                    <label class="ml-3 text-sm font-bold text-white tracking-wide">Username</label>
                    <input
                        class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-md focus:border-indigo-500"
                        type="text" name="username" id="username" placeholder="Masukkan username Anda">
                </div>
                <div class="mt-8 content-center">
                  <label class="ml-3 text-sm font-bold text-white tracking-wide">
                    Password
                  </label>
                  <input
                    class="w-full content-center text-base px-4 py-2 border-b rounded-md border-gray-300 focus:outline-none focus:border-indigo-500"
                    type="password" id="password" name="password" placeholder="Masukkan password Anda">
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    {{-- <input id="remember_me" name="remember_me" type="checkbox"
                      class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded"> --}}
                    <label for="remember_me" class="ml-2 block text-sm text-white">
                      <a href="https://wa.me/6285330283588">Klik disini jika lupa username dan password Anda</a>
                    </label>
                  </div>
                  <div class="text-sm">
                    {{-- <a href="#" class="text-indigo-400 hover:text-blue-500">
                      Lupa password?
                    </a> --}}
                  </div>
                </div>
                <div>
                  <button type="submit"
                    class="w-full flex justify-center hover:bg-blue-100 text-white p-4 rounded-md tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500" style="background: rgb(123,150,212)">
                    Login
                  </button>
                </div>
                {{-- <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                  <span>Belum punya akun?</span>
                  <a href="#"
                    class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Register</a>
                </p> --}}
              </form>
            </div>
          </div>
        </div>
      </div>
</body>
</html>