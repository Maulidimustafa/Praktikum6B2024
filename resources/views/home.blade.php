@extends('layout.main')
@push('css')
<style>
    p{
        color:blue;
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h1 class="text-primary">Selamat Datang {{Auth::user()->nama}} </h1>
                <p>lorem ipsum</p>
                <a href="/" class="btn btn-secondary"> Logout </a>
            </div>
        </div>
    </div>
@endsection