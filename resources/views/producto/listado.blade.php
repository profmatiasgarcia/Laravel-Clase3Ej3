@extends('layouts.principal')

@section('contenido')

@if (empty($productos))
<div class="alert alert-danger">No existen productos en Stock.</div>

@else
<h1>Listado de Todos los Productos</h1>

<table class="table table-bordered table-hover">

    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</td>
            <th scope="col">Precio</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Categoria</th>
            <th scope="col">Detalles</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($productos as $p)
        <tr class="table-{{ $p->cantidad <=1 ? 'danger' : ''}}">
            <td>{{$p->nombre}}</td>
            <td>{{$p->precio}}</td>
            <td>{{$p->descripcion}}</td>
            <td>{{$p->cantidad}}</td>
            <td>{{$p->proveedor}}</td>
            <td>{{$p->categoria->nombre}}</td>
            <td><a href="{{ route('mostrar',$p->id) }}"><i class="material-icons">search</i></a></td>
            <td><a href="{{ route('eliminar',$p->id) }}"><i class="material-icons">delete</i></a></td>
        </tr>
        @endforeach

    </tbody>
</table>

@endif

@if (old('nombre'))
<div class="alert alert-success">
    Producto {{old('nombre')}} agregado con exito!
</div>
@endif

<!-- <h4>
    <span class="badge badge-danger float-right">Uno o menos productos en stock</span>
</h4> -->
@stop
