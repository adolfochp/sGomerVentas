@extends('adminlte::page')

@section('title', 'Registrar Rol')

@section('content_header')

    <h1>Registrar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" autofocus >
                @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <span class="error text-danger">{{ $errors->first('name') }}</span>
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
                @if ($errors->has('description'))
                <div class="alert alert-danger">
                    <span class="error text-danger">{{ $errors->first('description') }}</span>
                </div>
                @endif
            </div>


            @include('admin.role._form')
            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
            {!! Form::close() !!}
        </div>
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
@stop
