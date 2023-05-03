<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Productos PDF</title>
   {{-- <style>
        .row {
            margin-top: 0px;
            width: 30%;
        }

        h4 {
            margin-top: 0px;
            width: 100%;
            letter-spacing: 12px;
            text-align: center;
        }

        h1 {
            width: 100%;
            margin-bottom: 2px;
            font-size: 20px;
            text-align: center;
        }

        .barra {
            width: 10px;
        }

        .codigo {
            width: 28%;
            float: left;
        }

    </style>  --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
    
        #datos {
            float: left;
            margin-top: 0%;
            margin-left: 2%;
            margin-right: 2%;
        }
    
        #encabezado {
            text-align: center;
            margin-left: 35%;
            margin-right: 35%;
            font-size: 15px;
        }
    
        #fact {
            float: right;
            margin-top: 2%;
            margin-left: 2%;
            margin-right: 2%;
            font-size: 20px;
            border-radius: 5px;
            color: rgb(230, 15, 15);
            font-weight: bold;
            background: #371c03;
            padding: 0 20px;
        }
    
        section {
            clear: left;
        }
    
        #cliente {
            text-align: left;
        }
    
        #facliente {
            width: 40%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }
    
        #fac,
        #fv,
        #fa {
            color: #FFFFFF;
            font-size: 15px;
        }
    
        #facliente thead {
            padding: 20px;
            background:#c533ff;
            text-align: left;
            border-bottom: 1px solid #FFFFFF;
        }
    
        #facvendedor {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }
    
        #facvendedor thead {
            padding: 20px;
            background: #33AFFF;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }
    
        #facproducto {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }
    
        #facproducto thead {
            padding: 20px;
            background: #33ffc2;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }
    
        #proveedor {
            text-align: justify;
        }
    </style>
</head>

<body>
 <div class="card">
        <div class="card-body">
            <table class="table table-striped mt-0.5 table-bordered shadow-lg mt-4" id="articulo">
                <thead class="bg-primary text-white">
                    
                        
                        
                    <tr>
                        <th scope="col" width='60px'>Código</th>
                        {{--<th scope="col">Imagen</th>--}}  

                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Categoría</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->codigo }}</td>
                          {{--  @if (isset($articulo->imagen))
                                <td class="text-center"><img src="{{ asset('storage' . '/' . $articulo->imagen) }}"
                                        alt="" width="80" height="60"></td>
                            @else
                                <td class="text-center"><img src="{{ asset('storage/app/public/uploads/imagen_defecto.png') }}"
                                        alt="" width="70" height="70"></td>
                            @endif--}}
                            <td>{{ Str::ucfirst($articulo->nombre) }}
                            </td>
                            <td >{{ $articulo->stock }}</td>
                            <td class="text-bold">{{ Str::ucfirst($articulo->categoria->nombre) }}</td>
                        
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
   @foreach ($articulos as $articulo)
   <div class="row">
       <h1>{{ ucwords($articulo->nombre) }}</h1>
       <div class="barra">{!! DNS1D::getBarcodeHTML($articulo->codigo, 'C128A') !!}</div>
       <h4>{{ $articulo->codigo }}</h4>
   </div>
@endforeach 


    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                {{-- <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}} --}}
            </p>
        </div>
    </footer>  
    
    
    </section>
    
</body>

</html>
