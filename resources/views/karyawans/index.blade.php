@extends('karyawans.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 10 CRUD Example</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('karyawans.create') }}"> Create New Karyawan</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Ktp</th>
        <th>Alamat</th>
        <th>Nohp</th>
        <th>Tanggal Lahir</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($karyawans as $karyawan)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $karyawan->name }}</td>
        <td>{{ $karyawan->ktp }}</td>
        <td>{{ $karyawan->address }}</td>
        <td>{{ $karyawan->nohp }}</td>
        <td>{{ $karyawan->tgl }}</td>
        <td>
            <form action="{{ route('karyawans.destroy',$karyawan->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('karyawans.show',$karyawan->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('karyawans.edit',$karyawan->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $karyawans->links() !!}

@endsection