<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    {{-- script --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/init-alpine.js') }}" defer></script> --}}

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>
<body >
    <div class="flex h-screen w-full bg-gray-800 " x-data="{openMenu:1}">
        <!--Start SideBar-->
        <aside class="w-20 relative z-20 flex-shrink-0  px-2 overflow-y-auto bg-indigo-600 sm:block"  style="background: rgb(27,48,97); 100%);">
            <div class="mb-6">
                <!--Start logo -->
                <div class="flex justify-center">
                  <div class="w-14 h-14 rounded-full bg-gray-300 border-2 border-white mt-2">
                    <img 
                      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVxhAxJ4D7MOeTTj6kR9PBeZonW5HM7giKjTbEmR-HMBwf3G1VqGnlwpO1kWrdyIZu8_U&usqp=CAU" 
                     class="rounded-full w-auto"
                    />
                  </div>
                </div>
                <!--End logo -->
                <!--Start NavItem -->
                <div>
                  <ul class="mt-6 leading-10 px-4">
                    <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-blue-400 cursor-pointer"
                        @click="openMenu !== 1 ? openMenu = 1 : openMenu = null"
                      >
                      <i class="fas fa-align-left fa-sm text-white"></i>
                    </li>
                    <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-pink-400 cursor-pointer">
                      <i class="fas fa-question-circle fa-sm text-white"></i>
                    </li>
                    <li class="mb-3 p-2 rounded-md flex items-center justify-center bg-yellow-400 cursor-pointer">
                      <i class="fas fa-headphones fa-sm text-white"></i>
                    </li>
                    <li class="absolute bottom-0 mb-3 p-2 rounded-full flex items-center mx-auto bg-white cursor-pointer">
                      <i class="fas fa-power-off fa-sm text-indigo-600"></i>
                    </li>
                  </ul>
                </div>
                <!--End NavItem -->
            </div>
        </aside>
        <!-- Start Open Menu -->
        <aside class="animate__animated animate__fadeInLeft w-52 relative z-0 flex-shrink-0 hidden px-4 overflow-y-auto bg-gray-100 sm:block " 
               x-show="openMenu ==  1" 
               @click.away="openMenu = null" 
               style="display: none;">
            <div class="mb-6">
              <!--Start Sidebar for open menu -->
              <div class="grid grid-cols-1 gap-4 grid-cols-2 mt-6">
                <!-- Start Navitem -->
                <div class="p-2 flex flex-col items-center bg-white rounded-md justify-center shadow-xl cursor-pointer">
                  <div class="rounded-full p-2 bg-indigo-200 flex flex-col items-center">
                    <i class="fas fa-chart-pie fa-sm text-indigo-600"></i>
                  </div>
                  <p class="text-xs mt-1 text-center font-semibold">Dashboard</p>
                </div>
                <!-- End Navitem -->
                <!-- Start Navitem -->
                <div class="p-2 flex flex-col items-center bg-white rounded-md justify-center shadow-xl cursor-pointer">
                  <div class="rounded-full p-2 bg-indigo-200 flex flex-col items-center">
                    <i class="fas fa-calculator fa-sm text-indigo-600"></i>
                  </div>
                  <p class="text-xs mt-1 text-center font-semibold">Calculator</p>
                </div>
                <!-- End Navitem -->
                <!-- Start Navitem -->
                <div class="p-2 flex flex-col items-center bg-white rounded-md justify-center shadow-xl cursor-pointer">
                  <div class="rounded-full p-2 bg-indigo-200 flex flex-col items-center">
                    <i class="fas fa-wallet fa-sm text-indigo-600"></i>
                  </div>
                  <p class="text-xs mt-1 text-center font-semibold">Wallet</p>
                </div>
                <!-- End Navitem -->
                <!-- Start Navitem -->
                <div class="p-2 flex flex-col items-center bg-white rounded-md justify-center shadow-xl cursor-pointer">
                  <div class="rounded-full p-2 bg-indigo-200 flex flex-col items-center">
                    <i class="fas fa-archive fa-sm text-indigo-600"></i>
                  </div>
                  <p class="text-xs mt-1 text-center font-semibold">Saving</p>
                </div>
                <!-- End Navitem -->
                <!-- Start Navitem -->
                <div class="p-2 flex flex-col items-center bg-white rounded-md justify-center shadow-xl cursor-pointer">
                  <div class="rounded-full p-2 bg-indigo-200 flex flex-col items-center">
                    <i class="fas fa-money-bill-wave-alt fa-sm text-indigo-600"></i>
                  </div>
                  <p class="text-xs mt-1 text-center font-semibold">Currencies</p>
                </div>
                <!-- End Navitem -->
                 <!-- Start Navitem -->
                <div class="p-2 flex flex-col items-center bg-white rounded-md justify-center shadow-xl cursor-pointer">
                  <div class="rounded-full p-2 bg-indigo-200 flex flex-col items-center">
                    <i class="fas fa-shopping-basket fa-sm text-indigo-600"></i>
                  </div>
                  <p class="text-xs mt-1 text-center font-semibold">Expenses</p>
                </div>
                <!-- End Navitem -->
              </div>
              <!--End Sidebar for open menu -->
            </div>
        </aside>
        <!-- End Open Menu -->
        
        <!-- End Sidebar -->
        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <!--Start Topbar -->

            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
              <div
                class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
              >
                <!-- Mobile hamburger -->
                <button
                  class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                  @click="toggleSideMenu"
                  aria-label="Menu"
                >
                  <svg
                    class="w-6 h-6"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
                <!-- Search input -->
                <div class="flex justify-center flex-1 lg:mr-32">
                  <div
                    class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
                  >
                    <div class="absolute inset-y-0 flex items-center pl-2">
                      <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div>
                    <input
                      class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                      type="text"
                      placeholder="Search for projects"
                      aria-label="Search"
                    />
                  </div>
                </div>
                <ul class="flex items-center flex-shrink-0 space-x-6">

                  <!-- Notifications menu -->
                  <li class="relative">
                    <button
                      class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                      @click="toggleNotificationsMenu"
                      @keydown.escape="closeNotificationsMenu"
                      aria-label="Notifications"
                      aria-haspopup="true"
                    >
                      <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                        ></path>
                      </svg>
                      <!-- Notification badge -->
                      <span
                        aria-hidden="true"
                        class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                      ></span>
                    </button>
                    <template x-if="isNotificationsMenuOpen">
                      <ul
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click.away="closeNotificationsMenu"
                        @keydown.escape="closeNotificationsMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                      >
                        <li class="flex">
                          <a
                            class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="#"
                          >
                            <span>Messages</span>
                            <span
                              class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                            >
                              13
                            </span>
                          </a>
                        </li>
                        <li class="flex">
                          <a
                            class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="#"
                          >
                            <span>Sales</span>
                            <span
                              class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                            >
                              2
                            </span>
                          </a>
                        </li>
                        <li class="flex">
                          <a
                            class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="#"
                          >
                            <span>Alerts</span>
                          </a>
                        </li>
                      </ul>
                    </template>
                  </li>
                  <!-- Profile menu -->
                  <li class="relative">
                    <button
                      class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                      @click="toggleProfileMenu"
                      @keydown.escape="closeProfileMenu"
                      aria-label="Account"
                      aria-haspopup="true"
                    >
                      <img
                        class="object-cover w-8 h-8 rounded-full"
                        src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                        alt=""
                        aria-hidden="true"
                      />
                    </button>
                    <template x-if="isProfileMenuOpen">
                      <ul
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click.away="closeProfileMenu"
                        @keydown.escape="closeProfileMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                        aria-label="submenu"
                      >
                        <li class="flex">
                          <a
                            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="#"
                          >
                            <svg
                              class="w-4 h-4 mr-3"
                              aria-hidden="true"
                              fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                              ></path>
                            </svg>
                            <span>Profile</span>
                          </a>
                        </li>
                        <li class="flex">
                          <a
                            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="#"
                          >
                            <svg
                              class="w-4 h-4 mr-3"
                              aria-hidden="true"
                              fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                              ></path>
                              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li class="flex">
                          <a
                            class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            href="#"
                          >
                            <svg
                              class="w-4 h-4 mr-3"
                              aria-hidden="true"
                              fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                              ></path>
                            </svg>
                            <span>Log out</span>
                          </a>
                        </li>
                      </ul>
                    </template>
                  </li>
                </ul>
              </div>
            </header>


          <main class="relative z-0 flex-1 pb-8 px-6 bg-white">
              <div class="grid pb-10  mt-4 ">
                  <!-- Start Content-->
                    <div class="mb-2">
                      <p class="text-lg font-semibold text-gray-400">Invoices</p>
                    </div>
                    <div class="grid grid-cols-12 gap-6 border-b-2 pb-5">
                      <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xxl:col-span-8">
                        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 mt-3">
                           <div class="p-4">
                              <p class="text-xl font-bold">RM 45,941</p>
                              <p class="text-xs font-semibold text-gray-400">Overdue</p>
                           </div>
                           <div class="p-4">
                              <p class="text-xl font-bold">RM 37,500</p>
                              <p class="text-xs font-semibold text-gray-400">Total Outstanding</p>
                           </div>
                           <div class="p-4">
                              <p class="text-xl font-bold">RM 9,200</p>
                              <p class="text-xs font-semibold text-gray-400">In Process</p>
                           </div>
                           <div class=" p-4">
                              <p class="text-xl font-bold">RM 5,700</p>
                              <p class="text-xs font-semibold text-gray-400">Paid Today</p>
                           </div>
                        </div>
                      </div>
                      <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xxl:col-span-4">
                          <div class="p-4">
                              <p class="text-sm text-gray-400">Outstanding Revenue</p>
                              <div class="shadow w-full bg-gray-100 mt-2">
                                  <div class="bg-indigo-600 text-xs leading-none py-1 text-center text-white" style="width: 55%"></div>
                               </div>
                                <p class="text-xs font-semibold text-gray-400 mt-2">RM 45,941 Overdue</p>
                           </div>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 mt-3">
                      <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                        style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                          <div class="absolute inset-0 bg-pink-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                          <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center justify-center">
                            <div>
                              <h3 class="text-center text-white text-lg">
                                   Total Balance
                              </h3>
                              <h3 class="text-center text-white text-3xl mt-2 font-bold">
                                   RM 27,580
                              </h3>
                              <div class="flex space-x-4 mt-4">
                                 <button class="block uppercase mx-auto shadow bg-white text-indigo-600 focus:shadow-outline 
                                  focus:outline-none text-white text-xs py-3 px-4 rounded font-bold">
                                  Transfer
                                </button>
                                <button class="block uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline 
                                   focus:outline-none text-white text-xs py-3 px-4 rounded font-bold">
                                  Request
                                </button>
                              </div>
                            </div>
                          </div>
                      </div>
                       <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                        style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                          <div class="absolute inset-0 bg-yellow-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
                            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                            <div>
                              <div class="text-white text-lg flex space-x-2 items-center">
                                <div class="bg-white rounded-md p-2 flex items-center">
                                  <i class="fas fa-toggle-off fa-sm text-yellow-300"></i>
                                </div>
                                <p>Finished Appt</p>
                              </div>
                              <h3 class="text-white text-3xl mt-2 font-bold">
                                  120
                              </h3>
                               <h3 class="text-white text-lg mt-2 text-yellow-100 ">
                                  4 not confirmed
                              </h3>
                            </div>
                          </div>
                      </div>
                       <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                        style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                          <div class="absolute inset-0 bg-blue-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
                          <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                            <div>
                              <div class="text-white text-lg flex space-x-2 items-center">
                                <div class="bg-white rounded-md p-2 flex items-center">
                                  <i class="fas fa-clipboard-check fa-sm text-blue-800"></i>
                                </div>
                                <p>Finished Appt</p>
                              </div>
                              <h3 class="text-white text-3xl mt-2 font-bold">
                                  72
                              </h3>
                               <h3 class="text-white text-lg mt-2 ">
                                 3.4% <span class='font-semibold text-blue-200'>vs last month</span>
                              </h3>
                            </div>
                          </div>
                      </div>
                              
                    </div>
                    
                  <!-- End Content-->
                  
              </div>
          </main>
          <div class="sm:flex-row pl-10 sm:pl-0 md:px-10 py-5" style="background: rgb(27,48,97); 100%);">
            <p class="text-white text-sm text-center">Copyright © 2021 PSCDC. All rights reserved. Design by Unit IT Poltekbang Surabaya</p>
        </div>
        </div>
    </div>
</body>
</html>