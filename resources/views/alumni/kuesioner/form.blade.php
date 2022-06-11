<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
    <form method="post" action="{{ $action }}">
        @csrf
        @foreach ($kuesioner as $item)
            {{-- section --}}
            <div>{{ $item->question }}</div>
            @foreach ($item->childquestions as $childquestion1)
                {{-- childquestion1 --}}
                    @if (! $childquestion1->questiontype)
                        <div>{{ $childquestion1->question }}</div>
                        @foreach ($childquestion1->childquestions as $childquestion2)
                             {{-- childquestion2 --}}
                            @if (! $childquestion2->questiontype)
                                <div>{{ $childquestion2->question }}</div>
                            {{-- @elseif ($childquestion2->questiontype == 'text')
                                <div class="w-full">
                                    <label for="fname">{{ $childquestion2->question }}</label>
                                    <input type="text" name="{{ $childquestion2->name }}" value="{{ old($childquestion2->name) ? old($childquestion2->name) : '' }}"><br><br>
                                </div> --}}
                            @elseif($childquestion2->questiontype == 'radio')
                                <div class="w-full">
                                    <p>{{ $childquestion2->question }}</p>
                                        @foreach ($childquestion2->choices as $choices)
                                            <div>
                                                <input type="radio" name="{{ $childquestion2->name }}" value="{{ $choices->choice }}">
                                                <label for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                            <div>
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
                                            <div>
                                        @endforeach
                                </div>
                            @elseif($childquestion2->questiontype == 'select')
                                <div class="w-full">
                                    <label for="{{ $childquestion2->name }}">{{ $childquestion2->question }}</label>
                                    <select name="{{ $childquestion2->name }}">
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
                            <input type="text" name="{{ $childquestion1->name }}" value="{{ old($childquestion1->name) ? old($childquestion1->name) : '' }}"><br><br>
                        </div>
                    @elseif($childquestion1->questiontype == 'radio')
                        <p>{{ $childquestion1->question }}</p>
                            @foreach ($childquestion1->choices as $choices)
                                <div>
                                    <input type="radio" name="{{ $childquestion1->name }}" value="{{ $choices->choice }}">
                                    @if ($choices->choice =='Lainnya')
                                        <label>{{ $choices->choice }}</label>
                                        <input type="text" name="{{ $childquestion1->name }}">
                                    @else
                                        <label>{{ $choices->choice }}</label> 
                                    @endif
                                <div>
                            @endforeach
                    @elseif($childquestion1->questiontype == 'checkbox')
                        <p>{{ $childquestion1->question }}</p>
                            @php
                                $checked = [];
                                if (! empty(old($childquestion1->name))) {
                                    $checked = array_filter(old($childquestion1->name));
                                }
                                dump($checked);
                            @endphp
                            @foreach ($childquestion1->choices as $choices)
                            
                                <div>
                                    @if ($choices->choice =='Lainnya')
                                        <input type="checkbox" {{ !empty($checked['lainnya']) ? 'checked' : '' }}>
                                        <label for="{{ $choices->name }}">{{ $choices->choice }}</label>
                                        <input type="text" name="{{ $childquestion1->name }}[lainnya]" value="{{ !empty($checked['lainnya']) ? $checked['lainnya'] : ''}}">
                                    @else
                                        <input type="checkbox" name="{{ $childquestion1->name }}[]" value="{{ $choices->choice }}" {{ in_array($choices->choice, $checked) ? 'checked' : '' }}>
                                        <label for="{{ $choices->name }}">{{ $choices->choice }}</label> 
                                    @endif    
                                <div>
                            @endforeach
                    @elseif($childquestion1->questiontype == 'select')
                        <div class="w-full">
                            <label for="{{ $childquestion1->name }}">{{ $childquestion1->question }}</label>
                            <select name="{{ $childquestion1->name }}">
                                @foreach ($childquestion1->choices as $choices)
                                    <option value="{{ $choices->choice }}">{{ $choices->choice }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif  
            @endforeach
        @endforeach
        <br><br>
        <input type="submit" value="Submit">
    </form>

    {{-- js --}}
    <script type="text/javascript">

    </script>
    {{-- end js --}}
</body>
</html>