<!--
  This component uses @tailwindcss/forms and @tailwindcss/aspect-ratio

  yarn add @tailwindcss/forms @tailwindcss/aspect-ratio
  npm install @tailwindcss/forms @tailwindcss/aspect-ratio

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/aspect-ratio')]
-->
@extends('layouts.app')

@section('content')
  <style>
    .no-spinners {
      -moz-appearance: textfield;
    }

    .no-spinners::-webkit-outer-spin-button,
    .no-spinners::-webkit-inner-spin-button {
      margin: 0;
      -webkit-appearance: none;
    }
  </style>

  <section class="mt-24 mb-10">
    <div class="relative max-w-screen-xl px-4 py-8 mx-auto">
      <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2">
        <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
          <div class="aspect-w-1 aspect-h-1">
            <img
              alt="Mobile Phone Stand"
              class="object-cover rounded-xl"
            src="{{ !empty($bimbingan_karir->flyer) ? asset('storage/'.$bimbingan_karir->flyer) : asset('storage/images/no-image.png')  }}"
            />
          </div>
        </div>

        <div class="sticky top-0">
          @foreach ($categoryname as $item)
            <strong class="border border-blue-600 rounded-full tracking-wide px-3 font-medium py-0.5 text-xs bg-gray-100 text-blue-600"> {{ !empty($item->category) ? $item->category : ''  }} </strong>
          @endforeach
          <div class="flex justify-between mt-8">
            <div class="min-w-32 bg-white min-h-48 p-3 mb-4 font-medium">
              <div class="w-32 flex-none rounded-t lg:rounded-t-none lg:rounded-l text-center shadow-lg ">
                <div class="block rounded-t overflow-hidden  text-center ">
                  <div class="bg-blue-500 text-white py-1">
                    {{ !empty($bimbingan_karir->schedule) ? date('M',strtotime($bimbingan_karir->schedule)) : '' }}
                  </div>
                  <div class="pt-1 border-l border-r border-white bg-white">
                    <span class="text-5xl font-bold leading-tight">
                      {{ !empty($bimbingan_karir->schedule) ? date_format($bimbingan_karir->schedule,"d") : '' }}
                    </span>
                  </div>
                  <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                    <span class="text-sm">
                      {{ !empty($bimbingan_karir->schedule) ? date('D',strtotime($bimbingan_karir->schedule)) : '' }}
                          </span>
                  </div>
                  <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                    <span class="text-xs leading-normal">
                      {{ !empty($bimbingan_karir->starttime) ? date('H:i',strtotime($bimbingan_karir->starttime)) : '' }} - {{ !empty($bimbingan_karir->endtime) ? date('H:i',strtotime($bimbingan_karir->endtime)) : 'selesai' }}
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="max-w-[35ch] mt-0">
              <h1 class="text-3xl font-bold">
                {{ !empty($bimbingan_karir->title) ? $bimbingan_karir->title : ''  }}
              </h1>

              {{-- <p class="mt-0.5 text-sm">
                Badan Usaha Milik Negara
              </p> --}}
            </div>
            

            {{-- <p class="text-lg font-bold">
              PENDAFTARAN TUTUP
            </p> --}}
          </div>

          

          <div class="relative mt-4 group">
            <div class="pb-6 prose max-w-none">
              <p>
                {{ !empty($bimbingan_karir->agendadesc) ? $bimbingan_karir->agendadesc : ''  }}
              </p>
            </div> 
          </div>
          <div class="flex mt-8">
            @if(!empty($bimbingan_karir->registerlink))
              <a href="{{ $bimbingan_karir->registerlink }}" class="button block px-5 py-3 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-500">Daftar sekarang</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection