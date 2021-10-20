<html>
    <body>
        @php
            // to change the action dynamically
            $action = route('create-bimbingan-karir'); // the default is insert form page. so the action is to insert/create
            if(Request::is('admin/layanan/bimbingan-karir/form-update*')){
                $action = route('update-bimbingan-karir', $bimbingan_karir->id);
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

        {{-- enctype digunakan agar data/file dapat terbaca --}}
        <form method="post" action="{{ $action }}" enctype="multipart/form-data"> 
            @csrf

            {{-- this is required when you use put method --}}
            @if (Request::is('admin/layanan/bimbingan-karir/form-update*'))
                    @method('PUT')
            @endif
            
            <label for="judul">Judul:</label><br>
            <input type="text" id="title" name="title" value="{{ !empty($bimbingan_karir->title) ? $bimbingan_karir->title : '' }}"><br>

            <label for="category">Kategori:</label><br>
            <select name="idcategory" id="category">
                @php
                    $idcategory = !empty($bimbingan_karir->idcategory) ? $bimbingan_karir->idcategory : null;
                @endphp
                @foreach ($category as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $idcategory) selected @endif>{{ $item->category }}</option>
                @endforeach
              </select><br>

            <label for="agendadesc">Deskripsi:</label><br>
            <textarea rows="4" cols="50" name="agendadesc">{{ !empty($bimbingan_karir->agendadesc) ? $bimbingan_karir->agendadesc : '' }}</textarea><br>

            <label for="schedule">Jadwal:</label><br>
            <input type="date" id="schedule" name="schedule" value="{{ !empty($bimbingan_karir->schedule) ? date('Y-m-d', strtotime($bimbingan_karir->schedule)) : '' }}"><br>
            
            <img id="preview-image" src="{{ !empty($bimbingan_karir->flyer) ? asset('storage/'.$bimbingan_karir->flyer) : '' }}" alt="">
            <label for="flyer">Flyer:</label><br>
            <input type="file" id="flyer" name="flyer" value=""><br>

            {{-- <label for="flyer">Slug:</label><br>
            <input type="text" id="slug" name="slug" value="{{ !empty($bimbingan_karir->slug) ? $bimbingan_karir->slug : '' }}"><br> --}}
            <br><br>
            <input type="submit" value="Submit">
          </form>
          <a href="{{ route('list-bimbingan-karir') }}">back</a>

          {{-- preview image script --}}
        <script
            src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
            integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
            crossorigin="anonymous">
        </script>
          <script type="text/javascript">
            $('#flyer').change(function(){
                   
                let reader = new FileReader();
                reader.onload = (e) => { 
                $('#preview-image').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            
           });
          </script>
    </body>
</html>