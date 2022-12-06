@extends('sidebar')

@section('container')
<h4 class="mt-5">Data Event Dibatalkan</h4>

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Event</th>
        <th>Nama Event</th>
        <th>ID Buku</th>
        <th>Tanggal Dibatalkan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
              <td>{{ $data->id_event }}</td>
              <td>{{ $data->nama_event }}</td>
              <td>{{ $data->id_buku }}</td>
              <td>
                      
                <a href="{{ route('event.restore', $data->id_event) }}" type="button" class="btn btn-warning rounded-3">Restore</a>
                
                <form action="{{ route('event.hardDelete', $data->id_event) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data?')">Hapus</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop