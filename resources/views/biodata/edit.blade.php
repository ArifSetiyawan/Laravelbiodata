@extends('layouts.app');
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Edit Biodata Siswa Bootcamp</h3>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops !</strong> there any some Error !!!<br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{route('biodata.update', $biodata->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <strong>Nama Siswa :</strong>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{$biodata->nama_siswa}}">
            </div>
            <div class="col-md-12">
                <strong>Alamat Siswa :</strong>
                <textarea name="alamat_siswa" id="alamat_siswa" cols="8" rows="8" class="form-control">{{$biodata->alamat_siswa}}</textarea>
            </div>
            <div class="col-md-12" style="margin-top: 5px">
                <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection