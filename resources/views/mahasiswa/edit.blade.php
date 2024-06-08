@extends('layout.main')
@section('content')
<div class="container">
    <div class="card mt-4 mb-4">
        <div class="card-header">
           Edit Data
        </div>
        <div class="card-body">
            <form action="{{Route('mahasiswa.update',$mahasiswa->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Jurusan</label>
                    <select name="jurusan" id="" class="form-control" value="{{$mahasiswa->jurusan}}">
                        <option value="">-Pilih-</option>
                        <option value="TI" {{$mahasiswa->jurusan=='TI' ? 'selected': ''}}>TI</option>
                        <option value="SI" {{$mahasiswa->jurusan=='SI' ? 'selected': ''}}>SI</option>
                    </select>
                    @error('jurusan')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">NPM</label>
                    <input type="text" name="npm" class="form-control" value="{{$mahasiswa->npm}}">
                    @error('npm')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$mahasiswa->nama}}">
                    @error('nama')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{$mahasiswa->tanggal_lahir}}">
                    @error('tanggal_lahir')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-danger">Isi apabila ingin mengganti foto</small>
                    @error('foto')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{Route('mahasiswa.index')}}" class="btn btn-light">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
