@extends('layouts.dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card">
            <div class="card-header bg-primary">Form</div>
            <div class="card-body">
                <form action="{{route('crued.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">name</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control">
                        @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control">
                        @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" name="number" value="{{old('number')}}" class="form-control">
                        @error('number')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            @error('password')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img width="100" src="" id="blah" alt="">
                        @error('photo')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <input type="submit" value="save" class="btn btn-success mt-2">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection