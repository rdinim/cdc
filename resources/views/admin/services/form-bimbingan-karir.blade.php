<html>
    <body>
        {{-- @php
            // to change the action dynamically
            $action = route('insertpegawai'); // the default is insert form page. so the action is to insert
            if (Request::is('formupdatepegawai*')) { //if this is update form page
                $action = route('updatepegawai', $pegawai->id);
            }
        @endphp --}}
        {{-- <form method="post" action="{{ $action }}"> --}}
        <form method="post" action=" ">

            {{-- @csrf
            
            {{-- this is required when you use put method --}}
            {{-- @if (Request::is('formupdatepegawai*'))
                @method('PUT')
            @endif --}}

            {{-- <label for="nama">Nama:</label><br> --}}
            {{-- 
                to make sure that data exists use: !empty($data)
            --}}
            {{-- <input type="text" id="nama" name="nama" value="{{ !empty($pegawai->nama) ? $pegawai->nama : '' }}"><br>
            <label for="usia">Usia:</label><br>
            <input type="number" id="usia" name="usia" value="{{ !empty($pegawai->usia) ? $pegawai->usia : '' }}"> --}}
            <label for="usia">Nama:</label><br>
            <input type="text" id="nama" name="nama" value=""><br>
            <label for="usia">Usia:</label><br>
            <input type="number" id="usia" name="usia" value=" ">
            <br><br>
            <input type="submit" value="Submit">
          </form>

          {{-- <a href="{{ route('pegawai') }}">back</a> --}}
    </body>
</html>