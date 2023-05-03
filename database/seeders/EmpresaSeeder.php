<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre_negocio' => 'SVS GOMER-SU',
            'descripcion' => 'Venta E IMPORTACION DE VENTAS, LLANTAS Y LUBRICANTES',
            'logo' => 'logo.png',
            'mail' => 'sosa-muebles@gmail.com',
            'direccion' => ' Av.Gral. JOSER TORRESC #216',
            'nit' => '10345612345',
        ]);
    }
}
