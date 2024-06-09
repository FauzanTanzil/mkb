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
                        <h6 class="text-center">Profil</h6>

                        <form action="{{url('profil')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" required name="name" value="{{auth()->user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" required name="email" value="{{auth()->user()->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Password <span class="text-danger">(opsional jika diubah)</span> </label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button class="btn btn-primary mt-2 mx-auto d-block">Simpan</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



@endsection