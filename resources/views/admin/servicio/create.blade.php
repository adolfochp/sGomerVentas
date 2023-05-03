@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
   
    <h1>Registrar Servicio</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => 'admin.servicio.store', 'method' => 'POST']) !!}
        <div class="card-body">
            @include('admin.servicio._form')
        </div>
        <div class="card-footer text-muted">
            <button type="submit" id="guardar" class="btn btn-success float-right">Registrar</button>
            <a href="{{ route('admin.servicio.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    {!! Html::style('select/dist/css/bootstrap-select.min.css') !!}

@stop


@section('js')
    {!! Html::script('select/dist/js/bootstrap-select.min.js') !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 1;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
        $("#articulo_id").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('articulo_id').value.split('_');

            $("#precio_ventservicio").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        }

        var articulo_id = $('#articulo_id');

        articulo_id.change(function() {
            $.ajax({
                url: "{{ route('get_products_by_id') }}",
                method: 'GET',
                data: {
                    articulo_id: articulo_id.val(),
                },
                success: function(data) {
                    $("#precio_servicio").val(data.precio_servicio);
                    $("#stock").val(data.stock);
                    $("#codigo").val(data.codigo);
                }
            });
        });
        $(obtener_registro());

        function obtener_registro(codigo) {
            $.ajax({
                url: "{{ route('get_products_by_barcode') }}",
                type: 'GET',
                data: {
                    codigo: codigo
                },
                dataType: 'json',
                success: function(data) {
                    $("#precio_servicio").val(data.precio_servicio);
                    $("#stock").val(data.stock);
                    $("#articulo_id").val(data.id);
                }
            });
        }
        $(document).on('keyup', '#codigo', function() {
            var valorResultado = $(this).val();
            if (valorResultado != "") {
                obtener_registro(valorResultado);
            } else {
                obtener_registro();
            }
        })

        function agregar() {
            datosProducto = document.getElementById('articulo_id').value.split('_');
            articulo_id = datosProducto[0];

            articulo = $("#articulo_id option:selected").text();
            cantidad = $("#cantidad").val();
            descuento = $("#descuento").val();
            precio_ventservicio = $("#precio_servicio").val();
            stock = $("#stock").val();
            impuesto = $("#impuesto").val();
            if (articulo_id != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio_servicio != "") {
                if (parseInt(stock) >= parseInt(cantidad)) {
                    subtotal[cont] = (cantidad * precio_servicio) - (cantidad * precio_servicio * descuento / 100);
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont +
                        '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                        ');"><i class="fa fa-trash-alt"></i></button></td> <td><input type="hidden" name="articulo_id[]" value="' +
                        articulo_id + '">' + articulo + '</td> <td> <input type="hidden" name="precio_venta[]" value="' +
                        parseFloat(precio_servicio).toFixed(2) + '"> <input class="form-control" type="number" value="' +
                        parseFloat(precio_servicio).toFixed(2) +
                        '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' +
                        parseFloat(descuento) + '"> <input class="form-control" type="number" value="' +
                        parseFloat(descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' +
                        cantidad + '"> <input type="number" value="' + cantidad +
                        '" class="form-control" disabled> </td> <td align="right">Bs ' + parseFloat(subtotal[cont]).toFixed(
                            2) + '</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lo siento',
                        text: 'La cantidad a vender supera el stock.',
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lo siento',
                    text: 'Rellene todos los campos del detalle de la venta.',
                })
            }
        }

        function limpiar() {
            $("#cantidad").val("");
            $("#descuento").val("0");
        }

        function totales() {
            $("#total").html("Bs " + total.toFixed(2));
            total_pagar = total;
            $("#total_pagar_html").html("Bs " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_pagar_html = total;
            $("#total").html("Bs" + total);
            $("#total_pagar_html").html("Bs" + total_pagar_html.toFixed(2));
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
    <script>
        $(document).ready(function() {
            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });
        });
    </script>

@stop
