@extends("layouts.navbar")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <style>
    @import url(http://fonts.googleapis.com/css?family=Roboto:400,100);

body {

  background-image: url({{asset('img/fondo.jpg')}}); no-repeat center center fixed;
  /*background: url(https://dl.dropboxusercontent.com/u/23299152/Wallpapers/wallpaper-22705.jpg) no-repeat center center fixed; */ 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: 'Roboto', sans-serif;
}

.login-card {
  padding: 50px;
  width: 300px;
  background-color: #CA2B3F;
  margin: 0 auto 10px;
  margin-top:200px;
  margin-right:
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  margin-left:300px;
}


.login-card2 {
  padding: 60px;
  width: 400px;
  background-color: #CA2B3F;
  margin: 0 auto 10px;
  margin-top:-260px;
  margin-right:300px;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
}

.login-card h1 {
  font-weight: 100;
  text-align: center;
  font-size: 30px;
  color: white;
}


.login-card2 h1 {
  font-weight: 100;
  text-align: center;
  font-size: 30px;
  color: white;
}

.login-card input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.login-card2 input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.login {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px; 
}

.login-submit {
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #421442;
  
 
}

.login-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #2E112D;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.login-card p {
  color: white;
  font-weight: 400;
  text-align: center;
  opacity: 0.9;
  
}


.login-card2 p {
  color: white;
  font-weight: 400;
  text-align: center;
  opacity: 0.9;
  
}

    </style>
</head>
<body>
@section("navbar")
  <div class="login-card">
    <h1>Puntaje Actual</h1>
    @foreach($puntajes as $puntos)
    <h1>{{$puntos -> puntaje}}</h1>
    @endforeach
    <p>Este es tu puntaje actual sobre el test</p>
</div>

<div class="login-card2">
    <h1>Desea Iniciar el test?</h1>
    <p>Iniciaremos tu Test para actualizar</p>
  <form action="/comienza" method="POST">
    <input type="submit" name="login" class="login login-submit" value="Iniciar">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
</div>
@endsection
</body>
</html>