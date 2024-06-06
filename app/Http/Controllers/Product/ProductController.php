<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Products\ProductService;
use App\Http\Requests\CreateProductRequest;
use App\Services\Categories\CategoryService;

class ProductController extends Controller
{

    private $categoryService;
    private $productService;

    public function __construct(CategoryService $categoryService , ProductService $productService  )
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }


    public function create()
    {

        $categories = $this->categoryService->getCategories();

        return view('product.create' , ['categories' => $categories]);
    }


    public function update($id)
    {

        $product = $this->productService->getProduct($id);
        $categories = $this->categoryService->getCategories();

        return view('product.update' , ['product' => $product , 'categories' => $categories]);
    }


    public function put(CreateProductRequest $request)
    {
        try
        {
            $data = $request->all();

            if($this->productService->updateProduct($data))
            {
                session()->flash('mensajeExito', '¡Producto actualizado con éxito!');
            }

        }catch(\Exception $e){
            session()->flash('mensajeError', '¡Tuvimos problemas al actualizar el producto. Contacta a soporte!');
        }


        return redirect('/');
    }


    public function store(CreateProductRequest $request)
    {

        try
        {
            $data = $request->all();

            if($this->productService->createProduct($data))
            {
                session()->flash('mensajeExito', '¡Producto creado con éxito!');
            }
        } catch (\Exception $e) {
            session()->flash('mensajeError', '¡Tuvimos problemas al crear el producto. Contacta a soporte!');
        }

        return redirect('/');

    }
}
