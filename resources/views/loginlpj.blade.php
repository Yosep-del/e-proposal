<!DOCTYPE html>
<html>
  <head>
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="/css/global.css" rel="stylesheet">
</head>
<body class="img">

<section class="justify-content-center"></section>

<section class="container-fluid img">
<section class="row justify-content-center"> 
  <section class="col-12 col-sm-6 col-md-3">
    <form class="form-container" action="/gologinlpj">
    <input type="hidden" name="_token" value="{{csrf_token()}}">    
    <h2>LOGIN</h2>
      <div class="form-group">
        <label for="exampleInputEmail1" style="font-weight: bold;">Username</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required>
        <small id="emailHelp" class="form-text text-muted">Silahkan Masukan username anda.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" style="font-weight: bold;">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        <small id="emailHelp" class="form-text text-muted">Silahkan Masukan password anda.</small>
      </div>
      <button type="submit" class="btn btn-primary">login</button>
      
    </form>

  </section>
</section>
  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@include('sweetalert::alert')
</body>
</html>