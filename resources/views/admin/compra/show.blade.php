@extends('adminlte::page')

@section('title', 'Detalles de Compra')

@section('content_header')

    <h1>Servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-4 text-center">
                    <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                    <p>{{ ucwords($compra->proveedor->razon_social) }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label" for="num_compra"><strong>Número Compra</strong></label>
                    <p>{{ $compra->id }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-control-label" for="num_compra"><strong>Comprador</strong></label>
                    <p>{{ ucwords($compra->user->name) }}</p>
                </div>
            </div>
            <div class="form-group row ">
                <h4 class="card-title ml-3 text-bold">Detalles de Servicio</h4>
                <div class="table-responsive col-md-12 table-bordered shadow-lg">
                    <table id="detalles" class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Producto</th>
                                <th>Precio (Bs)</th>
                                <th>Cantidad</th>
                                <th style="text-align: right; width: 200px;">SubTotal (Bs)</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="left">Bs. {{ number_format($compra->total, 2) }}</p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @foreach ($detallecompras as $detallecompra)
                                <tr>
                                    <td>{{ ucwords($detallecompra->articulo->nombre) }}</td>
                                    <td>Bs. {{ $detallecompra->precio_compra }}</td>
                                    <td>{{ $detallecompra->cantidad }}</td>
                                    <td align="left">Bs. {{number_format($detallecompra->cantidad * $detallecompra->precio_compra, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="{{ route('admin.compras.index') }}" class="btn btn-primary float-right">Regresar</a>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('js')

@stop
