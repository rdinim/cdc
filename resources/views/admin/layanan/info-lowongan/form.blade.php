<html>
    <body>
        @php
            // to change the action dynamically
            $action = route('create-info-lowongan'); // the default is insert form page. so the action is to insert/create
            if(Request::is('admin/layanan/info-lowongan/form-update*')){
                $action = route('update-info-lowongan', $info_lowongan->id);
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
            @if (Request::is('admin/layanan/info-lowongan/form-update*'))
                    @method('PUT')
            @endif
            
            <label for="title">Judul Lowongan:</label><br>
            <input type="text" id="title" name="title" value="{{ !empty($info_lowongan->title) ? $info_lowongan->title : '' }}"><br>

            <label for="company">Nama Perusahaan:</label><br>
                <select name="idcompany" id="company">
                    @php
                        $idcompany = !empty($info_lowongan->idcompany) ? $info_lowongan->idcompany : null;
                    @endphp
                    @foreach ($company as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $idcompany) selected @endif>{{ $item->companyname }}</option>
                    @endforeach
                </select><br>
            
            <label for="servicetype">Tipe Lowongan:</label><br>
                <select name="idservicetype" id="servicetype">
                    @php
                        $idservicetype = !empty($info_lowongan->idservicetype) ? $info_lowongan->idservicetype : null;
                    @endphp
                    @foreach ($servicetype as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $idservicetype) selected @endif>{{ $item->servicetype }}</option>
                    @endforeach
                </select><br>

            <label for="jobposition">Posisi:</label><br>
                <select name="idjobposition" id="jobposition">
                    @php
                        $idjobposition = !empty($info_lowongan->idjobposition) ? $info_lowongan->idjobposition : null;
                    @endphp
                    @foreach ($jobposition as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $idjobposition) selected @endif>{{ $item->position }}</option>
                    @endforeach
                </select><br>
            
                <label for="desc">Deskripsi:</label><br>
                <textarea rows="4" cols="50" name="desc">{{ !empty($info_lowongan->desc) ? $info_lowongan->desc : '' }}</textarea><br>

            <label for="openingdate">Tanggal Buka:</label><br>
            <input type="date" id="openingdate" name="openingdate" value="{{ !empty($info_lowongan->openingdate) ? date('Y-m-d', strtotime($info_lowongan->openingdate)) : '' }}"><br>

            <label for="closingdate">Tanggal Tutup:</label><br>
            <input type="date" id="closingdate" name="closingdate" value="{{ !empty($info_lowongan->closingdate) ? date('Y-m-d', strtotime($info_lowongan->closingdate)) : '' }}"><br>
            
            <label for="location">Lokasi:</label><br>
                <select name="idjoblocation" id="idjoblocation">
                    @foreach ($location as $item)
                        <optgroup label="{{ $item->namakota }}">
                            @php
                                $idjoblocation = !empty($info_lowongan->idjoblocation) ? $info_lowongan->idjoblocation : null;
                            @endphp
                            @foreach ($item->cities as $city)
                                <option value="{{ $city->idkota }}" @if ($city->idkota == $idjoblocation) selected @endif>{{ $city->namakota }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select><br>
            
            <label for="address">Alamat:</label><br>
            <input type="text" id="address" name="address" value="{{ !empty($info_lowongan->address) ? $info_lowongan->address : '' }}"><br>


            {{-- <label for="flyer">Flyer:</label><br>
            <input type="text" id="flyer" name="flyer" value=""><br> --}}

            {{-- <label for="flyer">Slug:</label><br>
            <input type="text" id="slug" name="slug" value="{{ !empty($info_lowongan->slug) ? $info_lowongan->slug : '' }}"><br> --}}
            <br><br>
            <input type="submit" value="Submit">
          </form>
          <a href="{{ route('list-info-lowongan') }}">back</a>
    </body>
</html>