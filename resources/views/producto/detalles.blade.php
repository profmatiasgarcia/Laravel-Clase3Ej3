@extends('layouts.principal')

@section('contenido')
<h1>Detalles del producto {{$p->nombre}}</h1>

<ul>
    <li>Precio: {{$p->precio}}</li>
    <li>Descripcion: {{$p->descripcion or 'sin descripcion'}}</li>
    <li>Cantidad en stock: {{$p->cantidad}}</li>
</ul>
@stop
