<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Support\Carbon;



class ProductRepository{



    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }


    public function allProducts()
    {

        return Product::join('categories', 'products.category_id', '=', 'categories.id')
                   ->select('products.*', 'categories.category as category_name')
                   ->paginate(10);
    }


    public function searchProduct($search)
    {
        return Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.category', 'LIKE', "%$search%")
                ->orWhere('products.nombre', 'LIKE', "%$search%")
                ->select('products.*', 'categories.category as category_name')
                ->paginate(10);
    }

    public function createProduct(array $data)
    {
        $product = new Product;

        $product->category_id = $data['categoria'];
        $product->nombre = $data['nombreProduct'];
        $product->descripcion = $data['descripcionProduct'];
        $product->precio = $data['precioProduct'];
        $product->cantidad = $data['cantidadProduct'];
        $product->fecha_creacion = Carbon::now();
        $product->created_at = Carbon::now();
        $product->estatus = true;
        $product->updated_at =null;


        return $product->save();
    }

    public function updateProduct(array $data)
    {
        $product = Product::findOrFail($data['idProduct']);

        $product->category_id = $data['categoria'];
        $product->nombre = $data['nombreProduct'];
        $product->descripcion = $data['descripcionProduct'];
        $product->precio = $data['precioProduct'];
        $product->cantidad = $data['cantidadProduct'];
        $product->estatus = $data['estatus'];
        $product->updated_at = Carbon::now();

        return $product->save();
    }

    public function deleteProduct($idProduct)
    {

        return Product::destroy($idProduct);
    }
}
