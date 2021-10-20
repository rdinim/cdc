<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Info Lowongan Karir</title>
</head>
<body>

    <form method="get" action="{{ route('list-info-lowongan') }}">
        <label for="title">Judul Lowongan:</label><br>
        <input type="text" id="title" name="title" value="{{ request('title') }}"><br>

        <label for="company">Nama Perusahaan:</label><br>
            <select name="idcompany" id="company">
                @php
                    $idcompany = !empty(request('idcompany')) ? request('idcompany') : null;
                @endphp
                <option value="">-- Nama Perusahaan --</option>
                @foreach ($company as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $idcompany) selected @endif>{{ $item->companyname }}</option>
                @endforeach
            </select><br>
        
        <label for="servicetype">Tipe Lowongan:</label><br>
            <select name="idservicetype" id="servicetype">
                @php
                    $idservicetype = !empty(request('idservicetype')) ? (request('idservicetype')) : null;
                @endphp
                <option value="">-- Tipe Lowongan --</option>
                @foreach ($servicetype as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $idservicetype) selected @endif>{{ $item->servicetype }}</option>
                @endforeach
            </select><br>

        <label for="jobposition">Posisi:</label><br>
            <select name="idjobposition" id="jobposition">
                @php
                    $idjobposition = !empty(request('idjobposition')) ? request('idjobposition') : null;
                @endphp
                <option value="">-- Posisi --</option>
                @foreach ($jobposition as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $idjobposition) selected @endif>{{ $item->position }}</option>
                @endforeach
            </select><br>
        
        <label for="location">Lokasi:</label><br>
            <select name="idjoblocation" id="idjoblocation">
                @foreach ($location as $item)
                    <option value="">-- Lokasi --</option>
                    <optgroup label="{{ $item->namakota }}">
                        @php
                            $idjoblocation = !empty(request('idjoblocation')) ? request('idjoblocation') : null;
                        @endphp
                        @foreach ($item->cities as $city)
                            <option value="{{ $city->idkota }}" @if ($city->idkota == $idjoblocation) selected @endif>{{ $city->namakota }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select><br>
        <br><br>
            
        <input type="submit" value="Cari">
    </form>


    <table border="1">
        <tr>
          <th>Judul Lowongan</th>
          <th>Nama Perusahaan</th>
          <th>Tipe Lowongan</th>
          <th>Posisi</th>
          {{-- <th>Deskripsi</th> --}}
          <th>Tanggal Buka</th>
          <th>Tanggal Tutup</th>
          <th>Lokasi</th>
          <th>Alamat</th>
          <th>Created_at</th>
          <th>Created_by</th>
          <th>Updated_at</th>
          <th>Updated_by</th>
          <th colspan="2">Action</th>
        </tr>
        @foreach ($info_lowongan as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ !empty($item->company->companyname) ? $item->company->companyname : '' }}</td>
                <td>{{ !empty($item->servicetype->servicetype) ? $item->servicetype->servicetype : '' }}</td>
                <td>{{ !empty($item->jobposition->position) ? $item->jobposition->position : '' }}</td>
                {{-- <td>{{ $item->agendadesc }}</td> --}}    
                <td>{{ !empty($item->openingdate) ? $item->openingdate->isoFormat('D MMMM Y') : '' }}</td>
                <td>{{ !empty($item->closingdate) ? $item->closingdate->isoFormat('D MMMM Y') : '' }}</td>
                <td>{{ !empty($item->location->namakota) ? $item->location->namakota : '' }}</td>
                <td>{{ !empty($item->address) ? $item->address : '' }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ !empty($item->creator->userdesc) ? $item->creator->userdesc : '' }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>{{ !empty($item->editor->userdesc) ? $item->editor->userdesc : '' }}</td>
                <td><a href="{{ route('form-update-info-lowongan', $item->id) }}"><button>update</button></a></td>
                <td>
                    <form method="post" action='{{ route('delete-info-lowongan', $item->id) }}'>
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
      </table>
      <a href="{{ route('form-create-info-lowongan') }}"><button>add</button></a>
</body>
</html>