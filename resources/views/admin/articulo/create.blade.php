@extends('adminlte::page')
@section('title', 'Producto')
@section('content_header')

    <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.articulos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Producto: </label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control"
                        tabindex="1" autofocus>
                    @if ($errors->has('nombre'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('nombre') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="codigo">Código: </label>
                    <input type="text" name="codigo" id="cantidad" value="{{ old('codigo') }}" class="form-control"
                        tabindex="2">
                    @if ($errors->has('codigo'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('codigo') }}</span>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="stock">Stock: </label>
                    <input type="number" name="stock" id="stock" min="0" max="999"
                        class="form-control" tabindex="3" step="1">

                </div>
            

                <div class="form-group">
                    <label for="imagen">Imagen: </label>
                    <input type="file" name="imagen" id="imagen" value="{{ old('imagen') }}" class="form-control"
                        tabindex="3">
                    @if ($errors->has('imagen'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('imagen') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="precio_venta">Precio Venta: </label>
                    <input type="number" name="precio_venta" step="0.01" min="0" max="10000" id="precio_venta"
                        value="precio_venta" class="form-control" tabindex="4">
                    @if ($errors->has('precio_venta'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('precio_venta') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoría: </label>
                    <select class="form-control" name="categoria_id" id="categoria_id" tabindex="5">
                        
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('categoria_id'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('categoria_id') }}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="proveedor_id">Proveedor: </label>
                    <select class="form-control" name="proveedor_id" id="proveedor_id" tabindex="6">
                        @foreach ($proveedors as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('proveedor_id'))
                        <div class="alert alert-danger">
                            <span class="error text-danger">{{ $errors->first('proveedor_id') }}</span>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success" tabindex="7">Guardar </button>
                <a href="{{ route('admin.articulos.index') }}" class="btn btn-secondary  ml-2 " tabindex="7">Cancelar</a>
            </form>
        </div>
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
<script>
    $("#precio_venta").blur(function() {
        this.value = parseFloat(this.value).toFixed(2);
    });
</script>
@stop
