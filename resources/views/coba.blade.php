<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Tracer Study</title>
</head>
<body>
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
        @foreach ($kuesioner as $item)
            {{-- section --}}
            <div id={{ $item->name }}>
                {{ $item->question }}
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
                @foreach ($item->childquestions as $childquestion1)
                    {{-- childquestion1 --}}
                        @if (! $childquestion1->questiontype)
                            <div>{{ $childquestion1->question }}</div>
                            @foreach ($childquestion1->childquestions as $childquestion2)
                                {{-- childquestion2 --}}
                                @if (! $childquestion2->questiontype)
                                    <div>{{ $childquestion2->question }}</div>
                                @elseif ($childquestion2->questiontype == 'text')
                                    <div class="w-full">
                                        <label for="fname">{{ $childquestion2->question }}</label>
                                        <input type="text" name="{{ $childquestion2->name }}" value="{{ old($childquestion2->name) ? old($childquestion2->name) : '' }}" required><br><br>
                                    </div>
                                @elseif($childquestion2->questiontype == 'radio')
                                    <div class="w-full">
                                        <p>{{ $childquestion2->question }}</p>
                                            @foreach ($childquestion2->choices as $choices)
                                                <div>
                                                    <input type="radio" name="{{ $childquestion2->name }}" value="{{ $choices->choice }}" required>
                                                    <label for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                                </div>
                                            @endforeach
                                    </div>
                                @elseif($childquestion2->questiontype == 'checkbox')
                                    <div class="w-full">
                                        <p>{{ $childquestion2->question }}</p>
                                            @foreach ($childquestion2->choices as $choices)
                                            @php
                                                old($childquestion2->name);
                                            @endphp
                                                <div>
                                                    <input type="checkbox" name="{{ $childquestion2->name }}[]" value="{{ $choices->choice }}" {{ (old($childquestion2->name) && old($childquestion2->name) == $choices->choice) ? 'checked' : '' }}>
                                                    <label for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                                </div>
                                            @endforeach
                                    </div>
                                @elseif($childquestion2->questiontype == 'select')
                                    <div class="w-full">
                                        <label for="{{ $childquestion2->name }}">{{ $childquestion2->question }}</label>
                                        <select name="{{ $childquestion2->name }}" required>
                                            <option value="">-- Pilih {{ $childquestion2->question }} --</option>
                                            @foreach ($childquestion2->choices as $choices)
                                                <option value="{{ $choices->choice }}">{{ $choices->choice }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            @endforeach    
                        @elseif ($childquestion1->questiontype == 'text')
                            <div class="w-full">
                                <label for="fname">{{ $childquestion1->question }}</label>
                                <input type="text" name="{{ $childquestion1->name }}" value="{{ old($childquestion1->name) ? old($childquestion1->name) : '' }}" required><br><br>
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
                            <p>{{ $childquestion1->question }}</p>
                                @foreach ($childquestion1->choices as $choices)
                                    <div  class="control-group">
                                        @if ($choices->choice =='Lainnya')
                                            <input type="radio" id="{{ $childquestion1->name }}" name="{{ $childquestion1->name }}" {{ !in_array($checked, $all_choices) && $checked != null ? 'checked' : '' }} value="{{ $childquestion1->name }}" required>
                                            <label for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                            <input class="{{ $childquestion1->name }}"type="text" name="{{ $childquestion1->name }}" value="{{ !in_array($checked, $all_choices) ? $checked : '' }}" {{ !in_array($checked, $all_choices) && $checked != null ? '' : 'disabled' }}>
                                        @else
                                            <input type="radio" name="{{ $childquestion1->name }}" value="{{ $choices->choice }}" {{ $choices->choice === $checked ? 'checked' : '' }} required>
                                            <label fors="{{ $choices->name }}">{{ $choices->choice }}</label> 
                                        @endif    
                                    </div>
                                @endforeach
                        @elseif($childquestion1->questiontype == 'checkbox')
                            <p>{{ $childquestion1->question }}</p>
                                @php
                                    $checked = [];
                                    if (! empty(old($childquestion1->name))) {
                                        $checked = array_filter(old($childquestion1->name));
                                    }
                                @endphp
                                @foreach ($childquestion1->choices as $choices)
                                    <div>
                                        @if ($choices->choice =='Lainnya')
                                            <input type="checkbox" {{ !empty($checked['lainnya']) ? 'checked' : '' }}>
                                            <label for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                            <input type="text" name="{{ $childquestion1->name }}[lainnya]" value="{{ !empty($checked['lainnya']) ? $checked['lainnya'] : ' '}}">
                                        @else
                                            <input type="checkbox" name="{{ $childquestion1->name }}[]" value="{{ $choices->choice }}" {{ in_array($choices->choice, $checked) ? 'checked' : '' }}>
                                            <label for="{{ $choices->name }}">{{ $choices->choice }}</label> 
                                        @endif    
                                    </div>
                                @endforeach
                        @elseif($childquestion1->questiontype == 'select')
                            <div class="w-full">
                                <label for="{{ $childquestion1->name }}">{{ $childquestion1->question }}</label>
                                <select name="{{ $childquestion1->name }}" required>
                                    <option value="">-- Pilih {{ $childquestion1->question }} --</option>
                                    @foreach ($childquestion1->choices as $choices)
                                        <option value="{{ $choices->choice }}">{{ $choices->choice }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif  
                @endforeach
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
        <button type="submit">Submit</button>
    </form>

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
        $('#section5').hide();
        $('#section6').hide();
        $('#section7').hide();

        $("#section1").find("input").each(function (i, e) {
          $(e).attr("required", true);
        });

        
        $(document).ready(function(){
            $("input[name='statuskerja']").change(function(){
                var radioValue = $("input[name='statuskerja']:checked").val();
                if(radioValue == 'Ya')
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
                }
            });

            $("input[name='duniakerja4[]']").change(function(){
                var checkboxValue = ($("input[name='duniakerja4[]']").is(":checked"));
                if(checkboxValue)
                {
                    $('#section7').show();
                }
            });
        });

        $(document).ready(function () {

        $('#form').validate({ // initialize the plugin
            rules: {
                'duniakerja4[]': {
                    required: true,
                }
                'situasikerja1[]': {
                    required: true,
                }
                'kerjapertama1[]': {
                    required: true,
                }
            },
            messages: {
                'duniakerja4[]', 'situasikerja1[]', 'kerjapertama1[]': {
                    required: "You must check at least 1 box",
                }
            }
        });

});

    
    </script>
</body>
</html>