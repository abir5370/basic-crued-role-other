@extends('layouts.dashboard')
@section('content')
<h4 class="text-center text-danger mb-4">This is Post and Comment table's one to one Relation.</h4>
<p>এই উদাহরনটা স্টুডেন্ট এবং ক্লাস ট্যাবল দিয়েও করা যায়।। যেমন একই ক্লাসে একাধিক স্টুডেন্ট থা</p>
<p class="text-danger text-center">post table data</p>
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
                    @foreach ($posts as $key=>$post)
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
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Insert post</div>
            <div class="card-body">
                <form action="{{route('post.data.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" name="title" class="form-control">
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
                    @foreach ($comments as $key=>$comment)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->post->post_title}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Insert Comments</div>
            <div class="card-body">
                <form action="{{route('comment.data.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <select name="post_id" class="form-control">
                            <option value="">--select post--</option>
                            @foreach($posts as $post)
                                <option value="{{$post->id}}">{{$post->post_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="comment" class="form-control">
                    </div>
                    <input type="submit" value="save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection