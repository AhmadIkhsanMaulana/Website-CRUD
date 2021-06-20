@extends('layout.template')

@section('title', 'Siswa')

@section('content')
<a href="/siswa/print" target="_blank" class="btn btn-primary">Print PDF</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Rombel</th>
            <th>Mata Pelajaran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
         @foreach ($siswa as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nis}}</td>
                <td>{{ $data->nama_siswa}}</td>
                <td>{{ $data->rombel}}</td>
                <td>{{ $data->mapel}}</td>
            </tr>
            @endforeach
    </tbody>
</table>

@endsection