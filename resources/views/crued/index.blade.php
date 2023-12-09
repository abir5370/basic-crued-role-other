@extends('layouts.dashboard')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card-header bg-primary">Form List</div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>name</th>
                        <th>email</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($crueds as $key=>$crued)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$crued->name}}</td>
                            <td>{{$crued->email}}</td>
                            <td>
                                <img width="50" src="{{asset('uploads/crued/'.$crued->photo)}}" alt="">
                            </td>
                            <td class="btn-group">
                                <a href="{{route('crued.edit',$crued->id)}}" class="btn btn-sm btn-primary mx-1">Edit</a>
                                <form action="{{route('crued.destroy',$crued->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm"  onclick="return confirm('Are You Sure Delete This!')">
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection