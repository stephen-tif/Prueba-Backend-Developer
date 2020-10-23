<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = array([
            'sku' => 'SO-0001',
            'nombre' => 'Bebida energetizante Red Bull',
            'cantidad' => '200',
            'precio' => '2.50',
            'descripcion' => 'Bebida energetica en presentacion de 335ml',
        ]);
        foreach($productos as $producto)
        {
            Producto::create($producto);
        }
    }
}
