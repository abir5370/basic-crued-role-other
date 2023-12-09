@extends('layouts.dashboard')
@section('content')
<h4 class="text-center text-danger mb-4">This is Category and Product table's Many to Many Relation.</h4>
{{-- <p>এই উদাহরনটা স্টুডেন্ট এবং ক্লাস ট্যাবল দিয়েও করা যায়।। যেমন একই ক্লাসে একাধিক স্টুডেন্ট থা</p> --}}
<p class="text-danger text-center">Category table data</p>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Insert Phone</div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>Post Title</th>
                        <th>Comment(this comment is under in this post)</th>
                    </tr>
                    {{-- @foreach ($posts as $key=>$post)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$post->post_title}}</td>
                        <td>
                            <ul>
                                @foreach ($post->comments as $comment)
                                <li>{{$comment->comment}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach --}}
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Insert Category</div>
            <div class="card-body">
                <form action="{{route('category.data.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <input type="submit" value="save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div><br><br>

<p class="text-danger text-center">comment table data</p>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Insert Comments</div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>Comment</th>
                        <th>post(this comment under which post)</th>
                    </tr>
                    @foreach ($Products as $key=>$product)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$product->name}}</td>
                        <td>
                            @foreach ($product->categories as $category)
                             {{$category->name}} 
                            @endforeach
                            
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Insert Product</div>
            <div class="card-body">
                <form action="{{route('product.data.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <select name="category_id[]" class="form-control" multiple>
                            <option value="">--select category--</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <input type="submit" value="save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection