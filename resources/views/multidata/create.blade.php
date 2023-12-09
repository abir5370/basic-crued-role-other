@extends('layouts.dashboard')
@section('content')
<h6>2 system multidata store. single multidata and multi-data store.2 different form and different table</h6><br>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Add Role</div>
            <div class="card-body">
                <form action="{{route('multiple.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h4 class="mb-2">Permission</h4>
                        @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline" style="margin-bottom: 0px!important; margin-top: 0px;">
                            <label class="form-check-label">
                                <input type="checkbox" value="{{$permission->name}}" name="multidata[]" class="form-check-input">{{$permission->name}}
                            <i class="input-frame"></i></label>
                        </div>
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>

{{-- multi-multidata-insert --}}
<br><br>
<h6>multi multiple data insert</h6>
<div class="row justify-content-center">
    <div class="col-md-6">
     <div class="card">
        <div class="card-title">multi multiple data insert</div>
        <div class="card-body">
            <form action="{{route('multi.multiple')}}" method="POST">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="form-group">
                    <div class="label">Name</div>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="disabledTextInput" style="display: block;">Includes</label>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="includes[]" value="BreakFast Included">
                          BreakFast Included
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="includes[]" value="Free Cancellation">
                          Free Cancellation
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="includes[]" value="Instant Confirmation">
                          Instant Confirmation
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="includes[]" value=" Reserve">
                          Reserve
                        </label>
                      </div>
            
                </div>
                <br>
                <!-- bed type -->
                
                <div class="col-md-6">
                    <label>Bed Type</label>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="bed_type[]" value="Double Bed">
                          1. Double Bed
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="bed_type[]"value="Bed">
                          2. Bed
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="bed_type[]"value="Single Bed">
                          3. Single Bed
                        </label>
                      </div>
                </div><br>
                <!-- facilities -->
                <div class="col-md-6">
                    <label>Facilities</label>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="facalities[]" value="Free parking">
                          Free parking
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="facalities[]" value="Airport Pickup">
                          Airport Pickup
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="facalities[]" value="Pets Allowed">
                          Pets Allowed
                        </label>
                      </div>
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
     </div>
    </div>
</div>
@endsection


