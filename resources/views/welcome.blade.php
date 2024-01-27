<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <h1 style="margin-top: 250px;" class="text-center">Welcome to Crued and <br> Role Permission Project's</h1>
   <p class="text-center text-danger">please <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}"> Register</a></p>

  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Message</div>
                <div class="card-body">
                    <form action="{{ route('contact.form') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <input type="text" name="message" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
       </div>
  </div>
 
</body>
</html>


