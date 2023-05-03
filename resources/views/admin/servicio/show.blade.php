@extends('adminlte::page')

@section('title', 'Detalles de Venta servicio')

@section('content_header')
<div class="form-row">
    <div class="col-md-6"></div>
    <div class="col-md-6 col-xl-12">
       
    </div>
</div>
    <h1>Detalle de venta servicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-4 text-center">
                    <label class="form-control-label "><strong>Cliente</strong></label>
                    <p>{{ucwords($ventservicio->cliente->nombre)}} {{ucwords($ventservicio->cliente->apellido_paterno)}}</p>
                    
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Número Venta Servicio</strong></label>
                    <p>{{$ventservicio->id}}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Vendedor</strong></label>
                    <p>{{Str::ucfirst($ventservicio->user->name)}}</p>
                </div>
            </div>
            <div class="form-group">
                <h4 class="card-title text-bold">Detalles de venta servicio</h4>
                <div class="table-responsive col-md-12 table-bordered shadow-lg">
                    <table id="saleDetails" class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Artículo</th>
                                <th>Precio Venta servicio (Bs)</th>
                                <th>Descuento(Bs)</th>
                                <th>Cantidad</th>
                                <th>SubTotal(Bs)</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="4">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="left">Bs. {{number_format($ventseervicio->total,2)}}</p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @foreach($detalleventaservicios as $detalleventservicio)
                            <tr>
                                <td>{{ucwords($detalleventservicio->articulo->nombre)}}</td>
                                <td>Bs. {{$detalleventa->precio_ventservicio}}</td>
                                <td>{{$detalleventservicio->descuento}} %</td>
                                <td>{{$detalleventservico->cantidad}}</td>
                                <td align="left">Bs. {{number_format($detalleventservicio->cantidad*$detalleventservicio->precio_ventservicio
                                 - $detalleventservicio->cantidad*$detalleventservicio->precio_ventservicio*$detalleventservicio->descuento/100,2)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="{{route('admin.ventservicios.index')}}" class="btn btn-primary float-right">Regresar</a>
        </div>
    </div>
</div>

@stop

@section('css')
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('js')
  
@stop