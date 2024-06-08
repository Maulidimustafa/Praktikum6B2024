@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card mt-4 mb-4">
                    <div class="card-header text-center">
                            Halaman Login
                    </div>
                        <div class="card-body "> 
                                <div class="text-center">
                                    <img src="{{asset('img/UNISKA.PNG')}}" alt="" width="30%">
                                </div>

                                <form action="{{Route('login')}}" method="post">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Enter Username" value="{{old('password')}}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" value="{{old('password')}}">
                                    </div>
                                    <div class="form-group mt-2 text-center">
                                        <button type="submit" class="btn btn-primary" >Login User</button>
                                    </div>
                                </form>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection