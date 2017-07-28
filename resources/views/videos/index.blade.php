@extends('layouts/app')
@section('content')
<div ng-app="clinica" ng-controller="servicio">
<form action="/videos/crearvideo" method="post" enctype="multipart/form-data">
	<div class="form-group">
	{{csrf_field()}}
	    titulo:
		<input type="text" name="titulo">
		<br>
		subir archivo:
		<input type="file" name="video">
		<br>
		<input type="submit" name="enviar">
	</div>
	<br>
	<!--<div>
		<video controls="controls" width="400" height="300">
			<source src="/peliculas/123.mp4" type="video/mp4">
		</video>
	</div>-->
</form>

<table border="1">

<tr>
	<th>Titulo:</th>
	<th>Direccion:</th>
	<th>video:</th>
    <th>cometar:</th>
</tr>

@foreach($lista as $item)
    <tr>
        <td>{{$item->titulo}}</td>
       <td>{{$item->direccion}}</td>
       <td><video controls="controls" width="400" height="300">
			<source src="{{$item->direccion}}" type="video/mp4">
		</video></td>
    </tr>
 @endforeach
 </table>
 




 <table class="table">
    <tr>
    <th>Titulo:</th>
	<th>Direccion:</th>
	<th>video:</th>
    <th>cometar:</th>
    </tr>

    <tr ng-repeat="item in lista">
        <td>@{{item.titulo}}</td>
        <td>@{{item.direccion}}</td>
        <td><video controls="controls" width="400" height="300">
			<source src="@{{item.direccion}}" type="video/mp4">
		</video></td>
        <td><a href="#" ng-click="onclickeditar(item.id)" >editar</a></td>
    </tr>

</table>

</div>
<br>
<br>
<br>
<br>
 @endsection