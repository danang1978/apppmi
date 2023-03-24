@extends('layout.v_template')

@section('title','Siswa')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
    @foreach ($siswa as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nis }}</td>
            <td>{{ $data->nama_siswa }}</td>
            <td>{{ $data->kelas }}</td>
            <td>{{ $data->mapel }}</td>
       
            <td>
                <a href="/guru/detail/{{ $data->id_siswa }}" class="btn btn btn-success">Detail</a>
                <a href="/guru/edit/{{ $data->id_siswa }}" class="btn btn btn-warning">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_siswa }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection