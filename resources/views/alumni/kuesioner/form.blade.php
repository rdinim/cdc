<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Poltekbang Surabaya Career Development Center</title>

    <!-- Scripts -->
    <style>
        label.error {
            color: red;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }
    
        input.error, textarea.error, select.error {
            border: 1px solid red;
            font-weight: 300;
            color: red;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    {{-- <script src="{{ mix('/js/app.js') }}"></script> --}}

    <title>Tracer Study</title>
</head>
<body>

<div id="app">
    {{-- memanggil navigasi --}}
    @include('partials.header')
    <div class="container mx-auto px-4 py-24">
        @php
            $temp_arr = [];
        @endphp
        {{-- error message --}}
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- end error message --}}

        {{-- form --}}
        @php
            $action = route('submit-kuesioner')
        @endphp
        <form method="post" id='form' action="{{ $action }}">
            @csrf
            <div>
                <div class="w-full rounded overflow-hidden shadow-md bg-white mt-10  mx-auto">
                    @foreach ($kuesioner as $item)
                        {{-- section --}}
                        <div id={{ $item->name }}>
                            <div class="mx-8 mb-10 mt-10">
                                <h1 class="font-bold text-2xl">{{ $item->question }}</h1>
                            </div>   
                                @php
                                    $prelimenary_names = $item->childquestions->toArray();
                                    // function untuk mendapat kan pilihan yang ada
                                    $all_names = array_map(function ($arr) {
                                        $questiontype = $arr['questiontype'];
                                        $name = $arr['name'];

                                        if ($questiontype == 'radio') {
                                            return("#$name");
                                        }
                                    }, $prelimenary_names);
                                    $names = array_filter($all_names);
                                    $temp_arr = array_merge($temp_arr, $names);
                                    // dump($loop->index);
                                @endphp
                                <div class="mx-8 mb-10">
                                    @foreach ($item->childquestions as $childquestion1)
                                        {{-- childquestion1 --}}
                                        @if (! $childquestion1->questiontype)
                                            <p for="helper-checkbox" class="mb-5 mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400">{{ $childquestion1->question }}</p>
                                            @if(! is_null($childquestion1->desc))
                                                <div>
                                                    <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                </div>
                                            @endif
                                            {{-- <div>{{ $childquestion1->question }}</div> --}}
                                            @foreach ($childquestion1->childquestions as $childquestion2)
                                                {{-- childquestion2 --}}
                                                @if (! $childquestion2->questiontype)
                                                <p class="font-medium text-gray-900 dark:text-gray-300">{{ $childquestion2->question }}</p>
                                                    {{-- <div>{{ $childquestion2->question }}</div> --}}
                                                @elseif ($childquestion2->questiontype == 'text')
                                                    <div class="mx-8 mb-10">
                                                        <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">{{ $childquestion2->question }}</label>
                                                        @if(! is_null($childquestion2->desc))
                                                            <div>
                                                                <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion2->desc }}</label>
                                                            </div>
                                                        @endif
                                                        <input type="text" class=" w-full bg-white-200 border border-gray-200 text-black text-md py-3 px-4 pr-8 mb-3 rounded" name="{{ $childquestion2->name }}" value="{{ old($childquestion2->name) ? old($childquestion2->name) : '' }}" required><br><br>
                                                    </div>
                                                @elseif($childquestion2->questiontype == 'radio')
                                                    <div class="mx-8 mb-10">
                                                        <p class="font-medium text-gray-900 dark:text-gray-300">{{ $childquestion2->question }}</p>
                                                        @if(! is_null($childquestion2->desc))
                                                            <div>
                                                                <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                            </div>
                                                        @endif
                                                            <fieldset>    
                                                                @foreach ($childquestion2->choices as $choices)
                                                                    <div class="flex items-center mb-4">
                                                                        <input type="radio" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 radioError" name="{{ $childquestion2->name }}" value="{{ $choices->choice }}" required>
                                                                        <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </fieldset>
                                                    </div>
                                                @elseif($childquestion2->questiontype == 'checkbox')
                                                    <div class="w-full">
                                                        <p class="font-medium text-gray-900 dark:text-gray-300">{{ $childquestion2->question }}</p>
                                                        @if(! is_null($childquestion2->desc))
                                                            <div>
                                                                <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                            </div>
                                                        @endif
                                                            <fieldset>
                                                                <legend class="sr-only">Checkbox</legend>
                                                                @foreach ($childquestion2->choices as $choices)
                                                                    @php
                                                                        old($childquestion2->name);
                                                                    @endphp
                                                                        <div class="flex items-center mb-4">
                                                                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 checkboxError" name="{{ $childquestion2->name }}[]" value="{{ $choices->choice }}" {{ (old($childquestion2->name) && old($childquestion2->name) == $choices->choice) ? 'checked' : '' }}>
                                                                            <label class="text-blue-600 hover:underline dark:text-blue-500" for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                                                        </div>
                                                                @endforeach
                                                            </fieldset>
                                                    </div>
                                                @elseif($childquestion2->questiontype == 'select')
                                                    <div class="w-full">
                                                        <label class="font-medium text-gray-900 dark:text-gray-300" for="{{ $childquestion2->name }}">{{ $childquestion2->question }}</label>
                                                        <div>
                                                            <select class=" w-full md:w-9/12 bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="{{ $childquestion2->name }}" required>
                                                                <option value="" class="font-medium text-gray-900 dark:text-gray-300">-- Pilih {{ $childquestion2->question }} --</option>
                                                                @foreach ($childquestion2->choices as $choices)
                                                                    <option value="{{ $choices->choice }}">{{ $choices->choice }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach    
                                        @elseif ($childquestion1->questiontype == 'text')
                                            <div>
                                                <label for="fname" class="mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400">{{ $childquestion1->question }}</label>
                                                @if(! is_null($childquestion1->desc))
                                                    <div>
                                                        <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                    </div>
                                                @endif
                                                <input type="text" class=" w-full bg-white-200 border border-gray-400 text-black text-md py-3 px-4 pr-8 mb-3 rounded" name="{{ $childquestion1->name }}" value="{{ old($childquestion1->name) ? old($childquestion1->name) : '' }}" required><br><br>
                                            </div>
                                        @elseif($childquestion1->questiontype == 'radio')
                                            @php
                                                // rows choices dari db
                                                $prelimenary_choices = $childquestion1->choices->toArray();
                                                // function untuk mendapat kan pilihan yang ada
                                                $all_choices = array_map(function ($arr) {
                                                    return($arr['choice']);
                                                }, $prelimenary_choices);

                                                $checked = old($childquestion1->name);
                                                // dump($checked)
                                            @endphp
                                            <p class="mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400">{{ $childquestion1->question }}</p>
                                            @if(! is_null($childquestion1->desc))
                                                <div>
                                                    <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                </div>
                                            @endif
                                                <fieldset>
                                                    @foreach ($childquestion1->choices as $choices)
                                                        <div  class="control-group">
                                                            <div class="flex items-center mb-4">
                                                                @if ($choices->choice =='Lainnya')
                                                                    <input type="radio" id="{{ $childquestion1->name }}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" name="{{ $childquestion1->name }}" {{ !in_array($checked, $all_choices) && $checked != null ? 'checked' : '' }} value="{{ $childquestion1->name }}" required>
                                                                    <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                                                    <span>&nbsp<input style="border:solid 2px gray;" class="{{ $childquestion1->name }}"type="text" name="{{ $childquestion1->name }}" value="{{ !in_array($checked, $all_choices) ? $checked : '' }}" {{ !in_array($checked, $all_choices) && $checked != null ? '' : 'disabled' }}></span>
                                                                @else
                                                                    <input type="radio" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 radioError" name="{{ $childquestion1->name }}" value="{{ $choices->choice }}" {{ $choices->choice === $checked ? 'checked' : '' }} required>
                                                                    <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $choices->name }}">{{ $choices->choice }}</label> 
                                                                @endif
                                                            </div>   
                                                        </div>
                                                    @endforeach
                                                </fieldset>
                                        @elseif($childquestion1->questiontype == 'checkbox')
                                            <p class="mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400">{{ $childquestion1->question }}</p>
                                            @if(! is_null($childquestion1->desc))
                                                <div>
                                                    <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                </div>
                                            @endif
                                                @php
                                                    $checked = [];
                                                    if (! empty(old($childquestion1->name))) {
                                                        $checked = array_filter(old($childquestion1->name));
                                                    }
                                                @endphp
                                                <fieldset>
                                                    @foreach ($childquestion1->choices as $choices)
                                                        <div class="flex items-center mb-4">
                                                            @if ($choices->choice =='Lainnya')
                                                                <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ !empty($checked['lainnya']) ? 'checked' : '' }}>
                                                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                                                <input style="border:solid 2px gray;" type="text" name="{{ $childquestion1->name }}[lainnya]" value="{{ !empty($checked['lainnya']) ? $checked['lainnya'] : ' '}}">
                                                            @else
                                                                <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 checkboxError" name="{{ $childquestion1->name }}[]" value="{{ $choices->choice }}" {{ in_array($choices->choice, $checked) ? 'checked' : '' }}>
                                                                <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="{{ $choices->name }}">{{ $choices->choice }}</label> 
                                                            @endif    
                                                        </div>
                                                    @endforeach
                                                </fieldset>
                                        @elseif($childquestion1->questiontype == 'select')
                                            <div class="mb-8">
                                                <label class="mt-5 font-medium text-lg font-bold text-gray-900 dark:text-gray-400" for="{{ $childquestion1->name }}">{{ $childquestion1->question }}</label>
                                                @if(! is_null($childquestion1->desc))
                                                    <div>
                                                        <label id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ $childquestion1->desc }}</label>
                                                    </div>
                                                @endif
                                                <select class="w-full bg-white-200 border border-gray-400 text-black text-md py-3 px-4 pr-8 mb-3 rounded" name="{{ $childquestion1->name }}" required>
                                                    <option value="">-- Pilih {{ $childquestion1->question }} --</option>
                                                    @foreach ($childquestion1->choices as $choices)
                                                        <option value="{{ $choices->choice }}">{{ $choices->choice }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif  
                                    @endforeach
                                </div>
                                @php
                                    $names_together = implode(", ", $temp_arr);
                                    // dump($names_together);
                                @endphp
                                {{-- @if ($loop->index + 1 < count($kuesioner))
                                    <button id="next" type="button" onclick="alert(<?php echo $loop->index + 1 ;?>)">Next</button>
                                @endif --}}
                                <hr>
                            
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="p-2 flex">
                <div class="w-1/2"></div>
                <div class="w-1/2">
                    <button type="submit" class="bg-gray-500 text-white p-2 rounded text-lg w-auto float-right">
                        Submit
                    </button>
            </div>
        </form>
    </div>
    
</div>
{{-- memanggil footer --}}
@include('partials.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    {{-- <script src="{{ asset('js/additional-methods.js') }}"></script> --}}

    {{-- js --}}
    <script type="text/javascript">
        $(function (){
            $(".next").click(function (){

            function getAllValues() {
                var inputValues = $('#mainDiv :input').map(function() {
                    var type = $(this).prop("type");

                    // checked radios/checkboxes
                    if ((type == "checkbox" || type == "radio") && this.checked) { 
                        return $(this).val();
                    }
                    // all other fields, except buttons
                    else if (type != "button" && type != "submit") {
                        return $(this).val();
                }
                })
                
                return inputValues.join(',');
            }

                // get the value of this radio button ("dollars" or "percent")
                var value = $(this).val();
                console.log('value', (value))

                // find all text fields...
                $(this).closest(".control-group").find("input[type=text]")

                // ...and disable them...
                .attr("disabled", "disabled")                     

                // ...then find the text field whose class name matches
                // the value of this radio button ("dollars" or "percent")...
                .end().find("." + value)

                // ...and enable that text field
                .removeAttr("disabled")          
                .end();
            });
        });

        $(function (){
            var ids = '<?php echo $names_together ;?>';
            $(ids).click(function (){

                // get the value of this radio button ("dollars" or "percent")
                var value = $(this).val();
                console.log('value', (value))

                // find all text fields...
                $(this).closest(".control-group").find("input[type=text]")

                // ...and disable them...
                .attr("disabled", "disabled")                     

                // ...then find the text field whose class name matches
                // the value of this radio button ("dollars" or "percent")...
                .end().find("." + value)

                // ...and enable that text field
                .removeAttr("disabled")          
                .end();
            });
        });
    </script>
    {{-- end js --}}

    {{-- show and hide section --}}
    <script type="text/javascript">
        $('#section3').hide();
        $('#section4').hide();
        $('#section5').hide();
        $('#section6').hide();
        $('#section7').hide();

        $("#section1").find("input").each(function (i, e) {
          $(e).attr("required", true);
        });
        
        $(document).ready(function(){

            $("input[name='tracerstudy1']").change(function(){
                var radioValue1 = $("input[name='tracerstudy1']:checked").val();
                if(radioValue1 == 'Saya tidak mencari kerja')
                {
                    $('#section3').hide();
                    $('#section4').show();
                    $("#section3").find("input").each(function (i, e) {
                    $(e).attr("required", false);
                    });
                }
                else
                {
                    $('#section3').show();
                    $('#section4').show();
                    $("#section3").find("input").each(function (i, e) {
                    $(e).attr("required", true);
                    });
                    $("#section4").find("input").each(function (i, e) {
                    $(e).attr("required", true);
                    });
                }
            });

            $("input[name='statuskerja']").change(function(){
                var radioValue2 = $("input[name='statuskerja']:checked").val();
                if(radioValue2 == 'Ya')
                {
                    // console.log(radioValue);
                    $('#section5').hide();
                    $('#section6').show();
                    $("#section5").find("input").each(function (i, e) {
                    $(e).attr("required", false);
                    });
                }
                else
                {
                    $('#section5').show();
                    $('#section6').hide();
                    $("#section6").find("input").each(function (i, e) {
                    $(e).attr("required", false);
                    });
                }

            });
            
            $("input[name='situasikerja2']").change(function(){
                var radioValue = $("input[name='situasikerja2']:checked").val();
                if(radioValue)
                {
                    $('#section7').show();
                    $("#section7").find("input").each(function (i, e) {
                    $(e).attr("required", true);
                    });
                }
            });

            $("input[name='duniakerja4[]']").change(function(){
                var checkboxValue = ($("input[name='duniakerja4[]']").is(":checked"));
                if(checkboxValue)
                {
                    $('#section7').show();
                    $("#section7").find("input").each(function (i, e) {
                    $(e).attr("required", true);
                    });
                }
            });

            $("input[name='duniakerja4[lainnya]']").change(function(){
                var checkboxLainnya = ($("input[name='duniakerja4[lainnya]']").val());
                if(checkboxLainnya)
                {
                    $('#section7').show();
                    $("#section7").find("input").each(function (i, e) {
                    $(e).attr("required", true);
                    });
                }
            });


        });

        $('#form').validate({ // initialize the plugin
            rules: {
                'duniakerja4[]': {
                    required: true,
                },
                'situasikerja1[]': {
                    required: true,
                },
                'kerjapertama1[]': {
                    required: true,
                },
                'nohp':{
                    required: true,
                    digits: true,
                    minlength:10, 
                    maxlength:12,
                },
                'email':{
                    required: true,
                    email: true,
                },
                'nit':{
                    required: true,
                },

                'tahunlulus':{
                    required : true,
                    digits : true,
                    minlength:4,
                    maxlength:4,
                },

                'kerjapertama3':{
                    required : true,
                    digits : true,
                },

                'kerjapertama4':{
                    required : true,
                    digits : true,
                },

                'kerjapertama5':{
                    required : true,
                    digits : true,
                },
            },
            messages: {

                'duniakerja4[]': {
                    required: "Anda harus centang minimal 1 pilihan",
                },
                'situasikerja1[]': {
                    required: "Anda harus centang minimal 1 pilihan",
                },
                'kerjapertama1[]': {
                    required: "Anda harus centang minimal 1 pilihan",
                },

                'nohp': {
                    required: 'Anda Harus mengisi no Hp',
                    digits : 'Nomor Handphone harus berupa angka 1-9',
                },
                'email':{
                    required: "Silahkan masukkan alamat email anda",
                    email: "Email seharusnya dalam format: abc@domain.tld", 
                },
                'tahunlulus':{
                    required: "Silahkan masukkan Tahun Lulus anda",
                    digits: "Masukkan berupa angka tahun dengan format: YYYY", 
                    minlength: "Masukkan berupa angka tahun dengan format: YYYY",
                    maxlength: "Masukkan berupa angka tahun dengan format: YYYY"
                },
                'kerjapertama3':{
                    required: 'Anda Harus mengisi pertanyaan ini',
                    digits : 'Isian harus berupa angka 1-9',
                },
                'kerjapertama4':{
                    required: 'Anda Harus mengisi pertanyaan ini',
                    digits : 'Isian harus berupa angka 1-9',
                },
                'kerjapertama5':{
                    required: 'Anda Harus mengisi pertanyaan ini',
                    digits : 'Isian harus berupa angka 1-9',
                },
            },

            //mengubah posisi error message
            errorPlacement: function(error, element) {
                if (element.hasClass("checkboxError") || element.hasClass("radioError")) {
                    // console.log();
                    error.insertBefore(element.parents('fieldset'));
                } 
                else {
                    error.insertAfter(element);
                 }
            },

            submitHandler: function(form) {
                form.submit();
            },

        });
    </script>

    <script>
        var menu;
        document.getElementById('menu-btn').addEventListener('click', function(e){
            if( menu == undefined ) {
                menu = document.getElementById('menu');
            }
            menu.classList.toggle("hidden");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</body>
</html>