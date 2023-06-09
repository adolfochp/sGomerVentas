@extends('adminlte::page')

@section('title', 'Registrar Usuario')

@section('content_header')

    <h1>Registrar Usuario</h1>
@stop

@section('content')
    <div class="card">
        
        <div class="alert alert-success mb-2 text-secondary text-bold">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
            <h6 class="pl-3 text-justify">
             {{--La contraseña debera cumplir con los siguientes requisitos:--}}    
                
            </h6>
            <h6 class="pl-3 text-justify">
                - al menos 1 caracter @$!%*#?&
            </h6>
            <h6 class="pl-3 text-justify">
                - al menos 1 letra mayúscula y  minúscula
            </h6>
            <h6 class="pl-3 text-justify">
                - al menos 1 dígito números del 0-9
            </h6>
           
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

            <div class="form-group">
                <label for="name">Nombre: </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico: </label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="password" class="form-control" aria-describedby="helpId" placeholder="$Ejemplo&1">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>

            @include('admin.user._form')
            <button type="submit" class="btn btn-success mr-2">Registrar</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
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
{{--<script language="javascript"> alert("juas");

</script>';--}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

{{--<script src="sweetalert2.all.min.js"></script>--}}
<script>
Swal.fire({
  title: ' Esta es una alerta  ',
  text: 'La contraseña debera cumplir con los siguientes requisitos:',
  })
</script>

@stop


