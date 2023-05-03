@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (auth()->user()->name =='Admin')
                <h5>Bienvenid@ al sistema SVS-Gomer-Su: <strong
                        style="color: rgb(20, 17, 21)">{{ ucwords(auth()->user()->name) }}</strong> </h5>
                        <h5>Si necesita ayuda. Por favor comunicarse con el encargado de la tienda</h5>
            @else
                <h5>Bienvenid@ al sistema SVS-Gomer-Su: <strong
                        style="color: rgb(90, 19, 111)">{{ ucwords(auth()->user()->name) }}</strong> </h5>
                        <h5>Si necesita ayuda. Por favor comunicarse con el correo chungarpinto@gmail.com </h5>
                        <hr>
                
            @endif
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
@stop

@section('css')
@stop

@section('js')

@stop
