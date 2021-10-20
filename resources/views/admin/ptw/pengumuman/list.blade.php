<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pengumuman</title>
</head>
<body>
    <table border="1">
        <tr>
          <th>Judul</th>
          {{-- <th>Deskripsi</th> --}}
          <th>Jadwal</th>
          <th>Created At</th>
          <th>Created By</th>
          <th>Updated At</th>
          <th>Updated By</th>
          <th colspan="2">Action</th>
        </tr>
        @foreach ($pengumuman as $item)
            <tr>
                <td>{{ $item->title }}</td>
                {{-- <td>{{ $item->agendadesc }}</td> --}}    
                <td>{{ !empty($item->schedule) ? $item->schedule->isoFormat('dddd, D MMMM Y') : '' }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ !empty($item->creator->userdesc) ? $item->creator->userdesc : '' }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>{{ !empty($item->editor->userdesc) ? $item->editor->userdesc : '' }}</td>
                <td><a href="{{ route('form-update-pengumuman', $item->id) }}"><button>update</button></a></td>
                <td>
                    <form method="post" action='{{ route('delete-pengumuman', $item->id) }}'>
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
      </table>
      <a href="{{ route('form-create-pengumuman') }}"><button>add</button></a>
</body>
</html>