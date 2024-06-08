@extends('layout.main')
@push('css')
@section('content')
<div class="container">
    <div class="card mt-4 mb-4">
        <div class="card-header">
           Data Mahasiswa
        </div>
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="mb-3 col-6">
                <form action="{{Route('mahasiswa.search')}}">
                    <input type="text" class="form-control" name="keyword" value="{{old('keyword')}}" placeholder="cari berdasarkan nama / npm">
                </form>
            </div>
            <div>
                <a type="button" class="btn btn-success" href="{{Route('mahasiswa.print')}}" target="__blank">Cetak Data</a>
                <a type="button" class="btn btn-primary" href="{{Route('mahasiswa.create')}}">+ Tambah</a>
            </div>
        </div>
    <div class="container">
    <table class="table table-bordered">
        <tr>
         <td>No</td>
         <td>Jurusan</td>
         <td>NPM</td>
         <td>Nama</td>
         <td>Tanggal Lahir</td>
         <td>Foto</td>
         <td>Aksi</td>
        </tr>
        @foreach($mahasiswa as $data)
        <tr>
         <td>{{$loop->iteration}}</td>
         <td>{{$data->jurusan}}</td>
         <td>{{$data->npm}}</td>
         <td>{{$data->nama}}</td>
         <td>{{Carbon\carbon::parse($data->tanggal_lahir)->format('d-m-y')}}</td>
         <td>
            <img src="{{asset('storage/foto/'.$data->foto)}}" alt="" width="50">
         </td>
        <td>
            <div class="text-center">
                <form action="{{Route('mahasiswa.destroy',$data->id)}}" method="post">
                    @csrf
                    @method('delete')   
                        <a href="{{Route('mahasiswa.edit',$data->id)}}" class="btn btn-info">Edit</a>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </td>
            </tr>
        @endforeach
    </table>
   </div>
  </div>
</div>
@endsection