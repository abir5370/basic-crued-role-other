@extends('layouts.dashboard')
@section('content')
<h4 class="text-center text-danger mb-4">This is User and Phone table's one to one Relation.</h4>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Insert Phone</div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>Name</th>
                        <th>User(User table theke asche)</th>
                    </tr>
                    @foreach ($phones as $key=>$phone)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$phone->name}}</td>
                        <td>{{$phone->user->name}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Insert Phone</div>
            <div class="card-body">
                <form action="{{route('data.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">User Name</label>
                        <select name="user_id" class="form-control">
                            <option value="">--select user--</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <input type="submit" value="save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection