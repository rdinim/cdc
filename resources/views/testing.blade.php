@extends('layouts.app')

@section('content')
 
	<div class="container mx-auto px-4 py-24">	
    <form action="">
          <!-- card -->
        <div class="w-full rounded overflow-hidden shadow-md bg-white mt-10  mx-auto bg-grey-500">
          <div class="mx-8 mb-10 mt-10">
              <h1 class="font-bold text-2xl">SECTION 1</h1>
          </div>
          <div class="mx-8 mb-10">
            <p for="helper-checkbox" class="mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400">Free shipping via Flowbite</p>
            <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</label>
            <input type="text" id="small-input" class=" w-full bg-white-200 border border-gray-200 text-black text-md py-3 px-4 pr-8 mb-3 rounded">
          </div>

          <div class="mx-8 mb-10">
            <p for="helper-checkbox" class="mb-5 mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400">pertanyaan anak 1</p>
              <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via Flowbite</label>
              <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</p>
              <select id="countries" class=" w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded">
                <option>United States</option>
                <option>Canada</option>
                <option>France</option>
                <option>Germany</option>
              </select>
            </div>
            <div class="mx-8 mb-10">
              <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via Flowbite</label>
              <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</p>
              <fieldset>
                <legend class="sr-only">Checkbox variants</legend>
                  <div class="flex items-center mb-4">
                      <input checked id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                      <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree to the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                  </div>
              </fieldset>
            </div>
            <div class="mx-8 mb-10">
              <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via Flowbite</label>
              <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</p>
              <br>
              <fieldset>
                <legend class="sr-only">Countries</legend>
              
                <div class="flex items-center mb-4">
                  <input id="country-option-1" type="radio" name="countries" value="USA" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked>
                  <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    United States
                  </label>
                </div>
              
                <div class="flex items-center mb-4">
                  <input id="country-option-2" type="radio" name="countries" value="Germany" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                  <label for="country-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Germany
                  </label>
                </div>
              
                <div class="flex items-center mb-4">
                  <input id="country-option-3" type="radio" name="countries" value="Spain" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                  <label for="country-option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Spain
                  </label>
                </div>
              
                <div class="flex items-center mb-4">
                  <input id="country-option-4" type="radio" name="countries" value="United Kingdom" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                  <label for="country-option-4" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    United Kingdom
                  </label>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="p-2 flex">
          <div class="w-1/2"></div>
          <div class="w-1/2">
              <button type="submit" class="bg-yellow-500 text-white p-2 ml-6 rounded text-lg w-auto float-right ">
                  Next
              </button>
              <button type="submit" class="bg-gray-500 text-white p-2 rounded text-lg w-auto float-right">
                  Preview
              </button>
        </div>
    </form>
  </div>
@endsection


