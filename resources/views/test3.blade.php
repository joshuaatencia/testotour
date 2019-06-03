@extends("layouts.navbar")
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Tour</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-reboot.min.css') }}">

  <style>
 		@import url(http://fonts.googleapis.com/css?family=Roboto:400,100);

body {
    background-image: url({{asset('img/fondotest.jpg')}}); no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: 'Roboto', sans-serif;
}

.login-card {
  padding: 40px;
  width: 800px;
  background-color: #FCDBCF;
  margin: 0 auto 10px;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
}

.login-card h1{
  font-weight: 100;
  text-align: center;
  font-size: 2.3em;
}


.login-card input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.pregunta{
  font-weight: 100;
  text-align: center;
  font-size: 2.3em;
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
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #F55E43;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.login-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #760233;
}

/* Container holding the image and the text */
.container {
  position: relative;
}

/* Bottom right text */
.text-block {
  position: absolute;
  bottom: 20px;
  right: 100px;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}

</style>

</head>
<body>
@section("navbar")
  <form action="/cristo" method="post">
  <div class="login-card">
    <h1>{{$usuario}} - Puntos: {{$suma}}</h1>

    <div class="container">
  <img src="img/cristo.jpg" alt="Norway" style="width:100%;">
  <div class="text-block"> 
    <h4>Cristo Redentor</h4>
    <p>El Cristo Redentor o Cristo del Corcovado, es una enorme estatua de Jesús de Nazaret con los brazos abiertos mostrando a la ciudad de Río de Janeiro, Brasil.</p>
  </div>
  
  </div>
  <h1 class="pregunta">Cristo redentor esta ubicado en</h1>
  <select class="browser-default custom-select" name="jesus">
  <option>Colombia</option>
  <option>China</option>
  <option>Brasil</option>
  <option>Chile</option>
  </select><br><br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="login" class="login login-submit" value="Avanzar">
  </form>
</div>
@endsection
</body>
</html>