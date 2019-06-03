@extends("layouts.navbaradmi")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.bin.js')}}"></script>
    <title>Administrador</title>
    <style>
    body {

background-image: url({{asset('img/fondo.jpg')}}); no-repeat center center fixed;
/*background: url(https://dl.dropboxusercontent.com/u/23299152/Wallpapers/wallpaper-22705.jpg) no-repeat center center fixed; */ 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
font-family: 'Roboto', sans-serif;
}
h1{
    color:#FBC891;
}
    </style>
</head>
<body>
@section("navbar")


    <div class="container">
    <h1>Lista  de Usuarios</h1>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Rol</th>
      <th scope="col">Puntos</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $datos)
    <tr>
      <th scope="row">{{$datos ->idusuario}}</th>
      <td>{{$datos ->usuario}}</td>
      <td>{{$datos ->nombre}}</td>
      <td>{{$datos ->rol}}</td>
      <td>{{$datos ->puntaje}}</td>
      <td><a href="/update/{{$datos->idusuario}}"><button class="btn btn-danger">eliminar</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
@endsection

</body>
</html>