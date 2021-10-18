<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Bimbingan Karir</title>
</head>
<body>
    <table border="1">
        <tr>
          <th>Judul</th>
          <th>Kategori</th>
          {{-- <th>Deskripsi</th> --}}
          <th>Jadwal</th>
          <th>Created At</th>
          <th>Created By</th>
          <th>Updated At</th>
          <th>Updated By</th>
          <th>Deleted At</th>
          <th>Deleted By</th>
          <th colspan="2">Action</th>
        </tr>
        @foreach ($bimbingan_karir as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->category->category }}</td>
                {{-- <td>{{ $item->agendadesc }}</td> --}}
                <td>{{ $item->schedule }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->created_by }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>{{ $item->deleted_at }}</td>
                <td>{{ $item->deleted_by }}</td>
                {{-- <td><a href="{{ route('formupdatepegawai', $item->id) }}"><button>update</button></a></td>
                <td>
                    <form method="post" action='{{ route('deletepegawai', $item->id) }}'>
                        @csrf
                        @method('DELETE')
                        <button>delete</button>
                    </form>
                </td> --}}
            </tr>
        @endforeach
      </table>
      {{-- <a href="{{ route('formpegawai') }}"><button>add</button></a> --}}
</body>
</html>