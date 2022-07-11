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
            src="{{ asset('storage/images/lowongan-kerja-bumn-2022.jpeg') }}"
            />
          </div>
        </div>

        <div class="sticky top-0">
          <strong class="border border-blue-600 rounded-full tracking-wide px-3 font-medium py-0.5 text-xs bg-gray-100 text-blue-600"> Lowongan Kerja </strong>

          <div class="flex justify-between mt-8">
            <div class="max-w-[35ch]">
              <h1 class="text-2xl font-bold">
                Lowongan Kerja BUMN 2022
              </h1>

              <p class="mt-0.5 text-sm">
                Badan Usaha Milik Negara
              </p>
            </div>

            <p class="text-lg font-bold">
              PENDAFTARAN TUTUP
            </p>
          </div>

          <div class="relative mt-4 group">
            <div class="pb-6 prose max-w-none">
              <p>
                BUMN membuka lowongan besar-besaran. Program Rekrutmen Bersama BUMN ini menyediakan 2.700 lowongan kerja BUMN untuk putra-putri terbaik bangsa.
              </p>
            </div>

            <table class="text-md">
              <tbody><tr>
                  <td class="align-center w-32">Posisi</td>
                  <td style="padding-left:5px; padding-right:5px;">:</td>
                  <td>-</td>
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
            

          <form class="mt-8">
            <div class="flex mt-8">
              <button
                type="submit"
                class="block px-5 py-3 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-500"
              >
                Apply
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection