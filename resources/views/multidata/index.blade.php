@extends('layouts.dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Multiple data manage</div>
            <div class="card-body">

                @if(count($multiples) > 0)
                <table border="1" class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Includes</th>
                            <th>Bed Type</th>
                            <th>Facilities</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($multiples as $key=>$multiple)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $multiple->name }}</td>
                                <td>
                                    @foreach(explode(',', $multiple->includes) as $include)
                                        <span class="badge badge-success">{{ $include }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach(explode(',', $multiple->bed_type) as $bedType)
                                        <span class="badge badge-info">{{ $bedType }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach(explode(',', $multiple->facilities) as $facility)
                                        <span class="badge badge-warning">{{ $facility }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('delete',$multiple->id)}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No multiples found.</p>
                @endif




                {{-- @if(count($multiples) > 0)
                <ul>
                    @foreach($multiples as $accommodation)
                        <li>
                            Name: {{ $accommodation->name }}<br>
                            Includes: {{ $accommodation->includes }}<br>
                            Bed Type: {{ $accommodation->bed_type }}<br>
                            Facilities: {{ $accommodation->facilities }}<br>
                        </li>
                    @endforeach
                </ul>
                @else
                    <p>No multiples found.</p>
                @endif --}}
            </div>
        </div>
    </div>
</div>
<br>

{{-- <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Multiple data manage</div>
            <div class="card-body">

                @if(count($singles) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($singles as $key=>$multiple)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $multiple->name }}</td>
                                
                                <td>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No multiples found.</p>
                @endif
            </div>
        </div>
    </div>
</div> --}}
@endsection