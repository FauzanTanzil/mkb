@extends('layouts.master')

@section('content')
<!-- Start Hero Section -->
<div class="hero mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-9">
                @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">{{session()->get('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center">Login</h6>

                        <form action="{{url('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" required name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" required name="password">
                            </div>

                            <button class="btn btn-primary mt-2 mx-auto d-block">Login</button>

                        </form>

                        <p class="text-end mt-3"><a href="{{url('register')}}">Register</a></p>
                        <p class="text-end mt-3">Lupa password ? <a href="{{url('reset-password')}}">Reset</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



@endsection