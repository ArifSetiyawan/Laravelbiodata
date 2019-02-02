@extends('layouts.app');
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>List Biodata Siswa Bootcamp</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{route('biodata.create')}}">Create New Biodata</a>
        </div>
    </div>

    @if ($message = Session::get('Success !!'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <table class="table table-hover table-sm">
        <tr>
            <th width="50px"><b>No.</b></th>
            <th width="300px"><b>Nama</b></th>
            <th>Alamat Siswa</th>
            <th width="180px"><b>Actions</b></th>
        </tr>
    @foreach ($biodatas as $biodata)
        <tr>
            <td><b>{{++$i}}.</b></td>
            <td>{{$biodata->nama_siswa}}</td>
            <td>{{$biodata->alamat_siswa}}</td>
            <td>
                <form action="{{ route('biodata.destroy' , $biodata->id) }}" method="POST">
                    <a class="btn btn-sm btn-success" href="{{route('biodata.show' , $biodata->id)}}">Show</a>
                    <a class="btn btn-sm btn-info" href="{{route('biodata.update' , $biodata->id)}}">Edit</a>
                   @csrf
                   @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button> 
                </form>
            </td>
        </tr>

    @endforeach
    </table>
    {!! $biodatas->links() !!}
</div>

@endsection