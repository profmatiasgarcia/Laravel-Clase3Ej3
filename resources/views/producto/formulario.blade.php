@extends('layouts.principal')

@section('contenido')

<h1>Nuevo producto</h1>

<form action="{{ route('ingresarnuevo') }}" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}" />

    <div class-"form-group">
         <label>Nombre</label>
        <input name="nombre" class="form-control" value="{{ old('nombre') }}" />
    </div>

    <div class-"form-group">
         <label>Precio</label>
        <input name="precio" value="{{ old('precio') }}" class="form-control"/>
    </div>

    <div class-"form-group">
         <label>Cantidad</label>
        <input name="cantidad" value="{{ old('cantidad') }}" class="form-control"/>
    </div>

    <div class-"form-group">
         <label>Proveedor</label>
        <input name="proveedor" value="{{ old('proveedor') }}" class="form-control"/>
    </div>

    <div class-"form-group">
         <label>Descripcion</label>
        <textarea name="descripcion" value="{{ old('descripcion') }}" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $c)
            <option value="{{$c->id}}">{{$c->nombre}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary" type="submit">Agregar</button>
</form>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@stop
