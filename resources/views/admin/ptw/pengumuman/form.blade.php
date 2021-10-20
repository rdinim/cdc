<html>
    <body>
        @php
            // to change the action dynamically
            $action = route('create-pengumuman'); // the default is insert form page. so the action is to insert/create
            if(Request::is('admin/ptw/pengumuman/form-update*')){
                $action = route('update-pengumuman', $pengumuman->id);
            }
        @endphp

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ $action }}">
            @csrf

            {{-- this is required when you use put method --}}
            @if (Request::is('admin/ptw/pengumuman/form-update*'))
                    @method('PUT')
            @endif
            
            <label for="judul">Judul:</label><br>
            <input type="text" id="title" name="title" value="{{ !empty($pengumuman->title) ? $pengumuman->title : '' }}"><br>

            <label for="agendadesc">Deskripsi:</label><br>
            <textarea rows="4" cols="50" name="agendadesc">{{ !empty($pengumuman->agendadesc) ? $pengumuman->agendadesc : '' }}</textarea><br>

            <label for="schedule">Jadwal:</label><br>
            <input type="date" id="schedule" name="schedule" value="{{ !empty($pengumuman->schedule) ? date('Y-m-d', strtotime($pengumuman->schedule)) : '' }}"><br>
            
            {{-- <label for="flyer">Flyer:</label><br>
            <input type="text" id="flyer" name="flyer" value=""><br> --}}

            {{-- <label for="flyer">Slug:</label><br>
            <input type="text" id="slug" name="slug" value="{{ !empty($pengumuman->slug) ? $pengumuman->slug : '' }}"><br> --}}
            <br><br>
            <input type="submit" value="Submit">
          </form>
          <a href="{{ route('list-pengumuman') }}">back</a>
    </body>
</html>