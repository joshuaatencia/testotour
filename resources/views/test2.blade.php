@extends("layouts.navbar")
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Tour</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

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
  <form action="/coliseo" method="post">
  <div class="login-card">
    <h1>{{$usuario}} - Puntos: {{$puntos}}</h1>

    <div class="container">
  <img src="img/coliseo.jpg" alt="Norway" style="width:100%;">
  <div class="text-block"> 
    <h4>Coliseo de Roma</h4>
    <p>El Coliseo o Anfiteatro Flavio es un anfiteatro de la época del Imperio romano, construido en el siglo I y ubicado en el centro de la ciudad de Roma.</p>
  </div>
  
  </div>
  <h1 class="pregunta">Fue construido en el siglo</h1>
  <select class="browser-default custom-select" name="roma">
  <option>I</option>
  <option>II</option>
  <option>IX</option>
  <option>IV</option>
  </select><br><br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="login" class="login login-submit" value="Avanzar">
  </form>
</div>
@endsection
</body>
</html>